<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo assets; ?>uploads/original/profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo strtoupper($_SESSION['USERNAME']) ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" id="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="menus">
                <a href="<?php echo base_url('campaign'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>List Campaign</span>
                </a>
            </li>

            <li class="menus">
                <a href="<?php echo base_url('summary'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>Report URL Tracker</span>
                </a>
            </li>

            <?php if ($isSuperAdmin){ ?>
            <li class="menus">
                <a href="<?php echo base_url('user'); ?>">
                    <i class="fa fa-folder-o"></i>
                    <span>User Accounts</span>
                </a>
            </li>
            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>