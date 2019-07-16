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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>Register</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">First Admin Register</p>

    <form action="<?php echo site_url().'RegisterController/register';?>" enctype="multipart/form-data" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="aname" name="aname" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="file" id="aphoto" class="form-control" name="aphoto" placeholder="Full name">
        <span class="form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="aemail" name="aemail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="amobile" name="amobile" placeholder="Mobile">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="apass" name="apass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="acpass" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="chk_terms"> I agree to the <a href="#">terms</a>
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="register">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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

  $("document").ready(function(){
    $("#register").click(function(){

        var aname = $("#aname").val();
        var uname = $("#uname").val();
        var aphoto = $("#aphoto").val();
        var aemail = $("#aemail").val();
        var amobile = $("#amobile").val();
        var apass = $("#apass").val();
        var acpass = $("#acpass").val();
        var np = /^[a-zA-Z ]+$/;
        var unp = /^[a-zA-Z0-9 ]+$/;
        var mp = /^[9876][0-9]{9}$/;
        var ep = /[a-zA-Z0-9]+\@gmail.com$/;
        $("#error").remove();
        if(uname == "" || !uname.match(unp))
        {
          $("#uname").after("<small class='text-danger' id='error'>Enter Username (special charecter not allow).</small>"); 
          $("#uname").focus();
          return false;
        }
        else if(aname == "" || !aname.match(np))
        {
          $("#aname").after("<small class='text-danger' id='error'>Enter Name (only text allow).</small>"); 
          $("#aname").focus();
          return false;
        }
        else if(aphoto == "")
        {
          $("#aphoto").after("<small class='text-danger' id='error'>Select Photo.</small>"); 
          $("#aphoto").focus();
          return false;
        }
        else if(aemail == "" || !aemail.match(ep))
        {
          $("#aemail").after("<small class='text-danger' id='error'>Enter Gmail (only gmail account allow ex.abc@gmail.com).</small>"); 
          $("#aemail").focus();
          return false;
        }
        else if(amobile == "" || !amobile.match(mp))
        {
          $("#amobile").after("<small class='text-danger' id='error'>Enter Mobile (only digit allow ex.9876543210).</small>"); 
          $("#amobile").focus();
          return false;
        }
        else if(apass == "" || apass.length < 4)
        {
          $("#apass").after("<small class='text-danger' id='error'>Enter Password min 4 digit.</small>"); 
          $("#apass").focus();
          return false; 
        }
        else if(acpass == "" || acpass != apass)
        {
          $("#acpass").after("<small class='text-danger' id='error'>Does not match Confirm Password.</small>"); 
          $("#acpass").focus();
          return false; 
        }
        
    });
  });
</script>
</body>
</html>
