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
                        <input type='text' id='keyword' class="form-control" placeholder='Campaign Name'>
                    </div>
                    <div class="col-sm-8">
                        <button id="btn_search" type="button" class="btn btn-info">Search</button>
                        <button id="btn_clear" type="button" class="btn btn-default">Clear</button>
                        <?php 
                        if($isAdmin){
                            echo "<button class='btn btn-success' data-toggle='modal' data-target='#newCampaign'>Create Campaign</button>";
                        } ?>
                        
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
                            <th>Campaign Name</th>
                            <th>Created Date</th>
                            <th>Start Date</th>
                            <th>Expired Date</th>
                            <th>Action</th>
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

<?php if ($isAdmin) { ?> 
<!-- Modal -->
<div class="modal fade" id="editCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Campaign_c/update'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Campaign Name</label>
                            <div class="col-sm-8">
                                <input type="text" id="mName" class="form-control" name="name" required>
                                <input type="hidden" id="mID" name="id">
                                <input type="hidden" id="mCampaignID" name="campaign_id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Start Date</label>
                            <div class="col-sm-8">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="start" id="mStart" readonly />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">End Date</label>
                            <div class="col-sm-8">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" name="end" id="mEnd" readonly />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Disc Product</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="disc_product" id="mDiscProduct" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Disc Product Ban</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="disc_product_ban" id="mDiscProductBan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="product_name" id="mProductName" >
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-success pull-right" value="Simpan">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Campaign_c/create'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Campaign Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Start Date</label>
                            <div class="col-sm-8">
                                <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" name="start" readonly required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Expired Date</label>
                            <div class="col-sm-8">
                                <div class='input-group date' id='datetimepicker4'>
                                    <input type='text' class="form-control" name="end" readonly required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Disc Product</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="disc_product">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Disc Product Ban</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="disc_product_ban">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="product_name">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-success pull-right" value="Simpan">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {

        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            ignoreReadonly:true
        });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            ignoreReadonly:true
        });

        $('#datetimepicker3').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            ignoreReadonly:true
        });

        $('#datetimepicker4').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            ignoreReadonly:true
        });

        var msg = "'Are you sure you want to delete this data'";
        
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
                "url": "<?php echo base_url('ajax/Report_c/getDataCampaign'); ?>",
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
                [2, "desc"]
            ],
            "pagingType": "simple_numbers",
            "columns": [{
                    data: 'rNum'
                },
                {
                    data: 'campaignName',orderable: false
                },
                {
                    data: 'createdAt',orderable: true
                },
                {
                    data: 'startDate',orderable: false
                },
                {
                    data: 'endDate',orderable: false
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                {
                    "extend": 'excelHtml5',
                    "title": '',
                    "messageTop": 'List Campaign',
                    "messageBottom": '',
                    "orientation": 'landscape',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                }
            ],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": 5,
                "render": function (data, type, row, meta) {

                    var btn = '<a data-id="' + row.id + '" class="btn btn-xs btn-info" href="<?php echo base_url('kol/'); ?>'+row.id+'">View</a> ';
                    var btnEdit = '';
                    var btnDelete = '';
                    <?php if ($isAdmin){ ?> 
                        btnEdit = '<a data-discproductban="'+row.discProductBan+'" data-discproduct="'+row.discProduct+'" data-productname="'+row.productName+'" data-id="' + row.id + '" data-name="' + row.campaignName + '" data-start="' + row.startDate + '" data-end="' + row.endDate + '" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editCampaign">Edit</a> ';
                        btnDelete = '<a data-id="' + row.id + '" class="btn btn-xs btn-danger" onclick="return confirm('+msg+')" href="<?php echo base_url('Campaign_c/delete/'); ?>'+row.id+'">Delete</a>';
                    <?php }?>
                    return btn.concat(btnEdit, btnDelete);
                }
            }],
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
            $('#from').val("");
            $('#to').val("");
        });

        $('#editCampaign').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');
            var start = button.data('start');
            var end = button.data('end');
            var discProduct = button.data('discproduct');
            var discProductBan = button.data('discproductban');
            var productName = button.data('productname');
            var modal = $(this);

            modal.find('#mID').val(id);
            modal.find('#mName').val(name);
            modal.find('#mStart').val(start);
            modal.find('#mEnd').val(end);
            modal.find('#mDiscProduct').val(discProduct);
            modal.find('#mDiscProductBan').val(discProductBan);
            modal.find('#mProductName').val(productName);
        });

    });
</script>