<style type="text/css">
    ul {
        margin-top: 10px;
    }

    a.report {
        color: black;
    }
</style>

<div class="content-wrapper" style="min-height: 1126.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $menu; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $menu; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php
        if ($notif) { ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-<?php echo $notif['ALERT']; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $notif['INFO']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="box">
            <div class="box-body">
                <div class="row">
                <div class="col-sm-4">
                        <input type='text' id='keyword' class="form-control" placeholder='Code'>
                    </div>
                    <div class="col-sm-8">
                        <button id="btn_search" type="button" class="btn btn-info">Search</button>
                        <button id="btn_clear" type="button" class="btn btn-default">Clear</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="box">
            <div class="box-body table-responsive cs2">
                <table class="table table-striped table-bordered nowrap" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Source</th>
                            <th>Kol Name</th>
                            <th>Ads Platform</th>
                            <th>Campaign Name</th>
                            <th>MSISDN</th>
                            <th>Received Date</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
    $(document).ready(function() {

        // Datapicker 
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
        });

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataDetailSummary/'.$kol_id); ?>",
                'data': function(data) {
                    // Read values
                    var from_date = $("#from").val();
                    var to_date = $("#to").val();
                    var column = $("#column").val();
                    var keyword = $("#keyword").val();

                    // Append to data
                    data.from = from_date;
                    data.to = to_date;
                    data.column = column;
                    data.keyword = keyword;
                },
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "order": [
                [7, "desc"]
            ],
            "pagingType": "simple_numbers",
            "columns": [{
                    data: 'rNum'
                },
                {
                    data: 'voucherCode',orderable: false
                },
                {
                    data: 'source',orderable: false
                },
                {
                    data: 'kolName',orderable: false
                },
                {
                    data: 'adsPlatform',orderable: false
                },
                {
                    data: 'campaignName',orderable: false
                },
                {
                    data: 'msisdn',orderable: false
                },
                {
                    data: 'created_at',orderable: true
                }
            ],
            "dom": 'lBfrtip',
            "scrollCollapse": true,
            "buttons": [
                'copyHtml5',
                {
                    "extend": 'excelHtml5',
                    "title": '',
                    "messageTop": 'Report Detail URL Tracker',
                    "messageBottom": '',
                    "orientation": 'landscape',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    }
                }
            ],
            "scrollY": '60vh',
            "rowCallback": function(row, data, index) {
                var pageInfo = table.page.info();
                var pageNumber = pageInfo.page;
                var pageSize = pageInfo.length;
                var rowNumber = pageNumber * pageSize + index + 1;
                $('td:eq(0)', row).html(rowNumber);
            }
        });

        table.draw();

        $('#btn_search').click(function() {
            if ($('#column').val() == ""){
                alert("Please choose your options");
            }
            $('#table').DataTable().ajax.reload();
        });

        $('#btn_clear').click(function() {
            $('#column').val("");
            $('#keyword').val("");
        });

    });
</script>