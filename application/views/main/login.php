<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_assets; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_assets; ?>bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_assets; ?>bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_assets; ?>dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_assets; ?>plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <a href="#"><b>Planet Ban</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Gunakan akun anda, untuk Log in</p>
    <?php if(!empty($notif)){ ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $notif; ?>
        </div>
    <?php } ?>
    <form action="<?php echo base_url('login'); ?>" method="post">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" required name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" required name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Log in">
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_assets; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_assets; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_assets; ?>plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>


</body></html>