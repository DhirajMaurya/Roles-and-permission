<?php
  $uid = $this->session->userdata('uid');
  if($uid!="")
  {
    redirect("Dashboard");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <?php
  $message=$this->session->flashdata('message');
  if($message!="")
  {
  ?>
  <div class="alert alert-danger alert-dismissible" id="alert_message">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <?php echo $message; ?>
  </div>
  <?php
  } 
  ?>
  <div class="login-logo">
    <a href="<?php echo site_url();?>"><b>Admin</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Admin sign in to start your session</p>

    <form action="<?php echo site_url().'LoginController/login';?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="lemail" name="lemail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="lpass" name="lpass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <small class="text-danger"><?php echo $error;?></small>
      </div>
      <div class="row">
        <div class="col-xs-8">
<!--           <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
 -->        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="btnlogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
     --><!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <?php
    if(count($check_data) == 0)
    {
    ?>
    <a href="<?php echo site_url().'RegisterController';?>" class="text-center">Only first time Admin Register.</a>
    <?php
    }
    ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>template/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  $(document).ready(function() {
    $("#btnlogin").click(function() {


      var lemail = $("#lemail").val();
      var lpass = $("#lpass").val();
      var ep = /[a-zA-Z0-9]+\@gmail.com$/;
      $("#error").remove();
      if(lemail=="" || !lemail.match(ep))
      {
        $("#lemail").focus();
        $("#lemail").after("<span class='text-danger small' id='error'>Enter valid amail Aaddress.</span>");
        return false;
      }
      else if(lpass=="" || lpass.length < 4)
      {
        $("#lpass").focus();
        $("#lpass").after("<span class='text-danger small' id='error'>Enter password min 4 digit.</span>");
        return false;
      }
    });
  });
  
  $("#alert_message").delay(3000).slideUp(1000);

</script>
</body>
</html>
