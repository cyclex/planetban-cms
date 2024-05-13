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

        <!-- Default box -->
        <div class="box">
            <div class="box-body table-responsive cs2">
            
            <?php if ($isAdmin){
                echo "<button class='btn btn-success pull-right' data-toggle='modal' data-target='#newKol' style='margin-left: 10px;'>Create Kol</button> <button class='btn btn-default pull-right' style='margin-left:10px' data-toggle='modal' data-target='#importKol'>Upload Kol</button> ";
                
            } ?>
                <table class="table table-striped table-bordered nowrap" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Voucher Code</th>
                            <th>Source</th>
                            <th>Kol Name</th>
                            <th>Ads Platform</th>
                            <th>URL Link</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <?php if ($isAdmin) { echo "<th>Action</th>"; }?>
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
<div class="modal fade" id="editKol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Kol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Kol_c/update'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Kol Name</label>
                            <div class="col-sm-8">
                                <input type="text" id="mName" class="form-control" name="kol_name" required>
                                <input type="hidden" id="mID" name="id">
                                <input type="hidden" id="mCampaignID" name="campaign_id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Voucher Code</label>
                            <div class="col-sm-8">
                                <input type="text" id="mVoucher" class="form-control" name="voucher_code" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Source</label>
                            <div class="col-sm-8">
                                <select name="source" class="form-control" id="mSource"  required>
                                    <option value="">Pilih</option>
                                    <?php 
                                        foreach ($this->config->item('source') as $key => $value) {
                                            echo "<option value='".$value."'>".$value."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Ads Platform</label>
                            <div class="col-sm-8">
                                <select name="ads_platform" class="form-control" id="mAds" required>
                                    <option value="">Pilih</option>
                                    <?php 
                                        foreach ($this->config->item('platform') as $key => $value) {
                                            echo "<option value='".$value."'>".$value."</option>";
                                        }
                                    ?>
                                </select>
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

<div class="modal fade" id="newKol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create Kol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Kol_c/create'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Kol Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kol_name" required>
                                <input type="hidden" name="campaign_id" value="<?php echo $this->uri->segment(2, 0); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Voucher Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="voucher_code" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Source</label>
                            <div class="col-sm-8">
                                <select name="source" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <?php 
                                        foreach ($this->config->item('source') as $key => $value) {
                                            echo "<option value='".$value."'>".$value."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Ads Platform</label>
                            <div class="col-sm-8">
                                <select name="ads_platform" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <?php 
                                        foreach ($this->config->item('platform') as $key => $value) {
                                            echo "<option value='".$value."'>".$value."</option>";
                                        }
                                    ?>
                                </select>
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

<div class="modal fade" id="importKol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Upload Kol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Kol_c/create'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">File .xlsx</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file" required>
                                <input type="hidden" name="campaign_id" value="<?php echo $this->uri->segment(2, 0); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a class="btn btn-warning" href="<?php echo base_url('assets/files/template-kol.xlsx') ?>" target="_blank">Download Template</a>
                        <input type="submit" class="btn btn-success pull-right" value="Upload">
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

        var msg = "'Are you sure you want to delete this data'";

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataDetail/'.$campaign_id); ?>"
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "order": [
                [6, "desc"]
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
                    data: 'urlLink',orderable: false
                },
                {
                    data: 'createdAt',orderable: true
                },
                {
                    data: 'status',orderable: true
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                {
                    "extend": 'excelHtml5',
                    "title": '',
                    "messageTop": 'Detail Campaign',
                    "messageBottom": '',
                    "orientation": 'landscape',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    }
                }
            ],
            "scrollY": '60vh',
            "scrollCollapse": true,
            <?php if ($isAdmin) { ?> 
            "columnDefs": [{
                "targets": 8,
                "render": function (data, type, row, meta) {

                    var btn = "";
                    if (row.status=="Tersedia"){
                        var btnEdit = '<a data-id="' + row.id + '" data-voucher="' + row.voucherCode + '" data-source="' + row.source + '" data-name="' + row.kolName + '" data-ads="'+row.adsPlatform+'" data-campaignid="'+row.campaignID+'" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editKol">Edit</a> ';
                        var btnDelete = '<a data-id="' + row.id + '" class="btn btn-xs btn-danger" onclick="return confirm('+msg+')" href="<?php echo base_url('Kol_c/delete/'); ?>'+row.id+'/'+row.campaignID+'">Delete</a>';
                        return btn.concat(btnEdit, btnDelete);
                    } else {
                        var btnEdit = '<a class="btn btn-xs btn-warning disabled">Edit</a> ';
                        var btnDelete = '<a class="btn btn-xs btn-danger disabled">Delete</a>';
                        return btn.concat(btnEdit, btnDelete);
                    }
                    
                }
            }],
            <?php } ?>
            "rowCallback": function(row, data, index) {
                var pageInfo = table.page.info();
                var pageNumber = pageInfo.page;
                var pageSize = pageInfo.length;
                var rowNumber = pageNumber * pageSize + index + 1;
                $('td:eq(0)', row).html(rowNumber);
            }
        });

        table.draw();

        $('#editKol').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var voucher = button.data('voucher');
            var source = button.data('source');
            var name = button.data('name');
            var ads = button.data('ads');
            var campaignID = button.data('campaignid');
            name = name.replace(/@/g, "");
            var modal = $(this);

            modal.find('#mID').val(id);
            modal.find('#mName').val(name);
            modal.find('#mVoucher').val(voucher);
            modal.find('#mSource').val(source);
            modal.find('#mAds').val(ads);
            modal.find('#mCampaignID').val(campaignID);
        });

    });
</script>