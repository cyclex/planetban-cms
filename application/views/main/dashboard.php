<div class="content-wrapper" style="min-height: 916px;">
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
      <!-- Info boxes -->
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

    </section>
    <!-- /.content -->
  </div>