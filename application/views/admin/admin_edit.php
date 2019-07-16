
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Admin
      
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url().'AdminController/admin_update/'.$edit_data->Uid;?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="uname">Username <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username." value="<?php echo $edit_data->Uusername;?>">
                    </div>
                    
                    <div class="form-group">
                      <label>Select Gender <span class="text-danger">*</span></label>
                      <div class="form-inline form-control ugender">
                      <div class="radio" style="margin-right: 10%;">
                        <label>
                          <input type="radio" name="ugender" class="flat-red" id="gender1" value="1" <?php echo ($edit_data->Ugender==1)?'checked':'';?>>
                          Male
                        </label>
                      </div>
                      <div class="radio" style="margin-right: 10%;">
                        <label>
                          <input type="radio" name="ugender" class="flat-red" id="gender2" value="2" <?php echo ($edit_data->Ugender==2)?'checked':'';?>>
                          Female
                        </label>
                      </div>
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="umobile">Mobile <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="umobile" name="umobile" placeholder="Enter mobile ex.9876543210" value="<?php echo $edit_data->Umobile;?>">
                    </div>
                    <div class="form-group urole">
                      <label>Role <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="urole" id="urole">
                        <option value="">select</option>
                        <?php foreach($role_data as $role_data){ ?>
                          <option value="<?php echo($role_data->Roleid);?>" <?php echo ($role_data->Roleid==$edit_data->Roleid)?'selected':'';?>><?php echo($role_data->Rolename);?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Select Permission <span class="text-danger">*</span></label>
                      <div class="table-bordered" style="padding: 15px;"  id="herror">
                      <?php foreach($perm_data as $perm_data){ ?>
                        <label>
                          <input type="checkbox" class="minimal" name="perm[]" value="<?php echo($perm_data->Permid);?>" <?php echo (in_array($perm_data->Permdesc,$user_perm))?'checked':'';?> ><?php echo($perm_data->Permdesc);?>
                        </label><br>
                      <?php } ?>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ufname">Full Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="ufname" name="ufname" placeholder="Enter full name" value="<?php echo $edit_data->Uname;?>">
                    </div>
                    <div class="form-group">
                      <label for="uemail">Email address <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter email"value="<?php echo $edit_data->Uemail;?>">
                    </div>
                    <div class="form-group">
                      <label for="upass">Password <span class="text-danger">*</span></label>
                      <input type="hidden" name="oldpass" value="<?php echo $edit_data->Upassword;?>">
                      <input type="password" class="form-control" id="upass" name="upass" placeholder="Enter password" autocomplete="off" value="<?php echo $edit_data->Upassword;?>">
                    </div>
                    <div class="form-group">
                      <label for="uphoto">Photo <span class="text-danger">*</span></label>
                      
                      <div class="table-bordered" id="photo_close">
                        <img src="<?php echo base_url().'imagesbook/admin_photo/'.$edit_data->Uphoto;?>" style="height: 100px;">
                        <span style="font-size: 24px;cursor: pointer;" onclick="update_image()">X</span>
                      </div>
                      <!-- <p class="help-block">Example block-level help text here.</p> -->
                    </div>

                    <div class="form-group ustatus">
                      <label>Status <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="ustatus" id="ustatus">
                        <option value="">select</option>
                        <option value="1" <?php echo ($edit_data->Ustatus==1)?'selected':'';?>>Active</option>
                        <option value="0" <?php echo ($edit_data->Ustatus==0)?'selected':'';?>>Deactive</option>
                      </select>
                    </div>
                    
                    

                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo site_url().'AdminController/admin_list/';?>" class="btn btn-danger" style="margin-right: 20px">Back</a>
                <button type="submit" onclick="return validation();" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>

    document.addEventListener('DOMContentLoaded', function() {
        $('#datepicker').datepicker({
            format: 'dd-mm-yyyy',
            startDate: '01-01-1970',
            endDate: 'today',
            clearBtn: true
        });
        $('#datepicker1').datepicker({
            format: 'dd-mm-yyyy',
            startDate: 'today',
            //endDate: 'today',
            clearBtn: true
        });
    });


    function view_photo(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $("#rphoto").remove();
              $('#uphoto').after("<img src='"+e.target.result+"' id='rphoto' class='img img-thumbnail' style='height:150px'>");
              $("#error").remove();
          }
          
          reader.readAsDataURL(input.files[0]);
      }
    }
    /*
    $("#ephoto").change(function(){
        readURL(this);
    });*/


    function update_image()
    {
      $("#photo_close").hide();
      $("#photo_close").after("<input type='file' id='uphoto' name='uphoto' class='form-control'  onchange='view_photo(this)'>");
    }

    function validation()
    {
      $("#error").remove();
      var uname = $("#uname").val();
      var ufname = $("#ufname").val();
      var gender1 = $("#gender1").is(":checked");
      var gender2 = $("#gender2").is(":checked");
      var email = $("#uemail").val();
      var mobile = $("#umobile").val();
      var pass = $("#upass").val();
      var photo = $("#uphoto").val();
      var role = $("#urole").val();
      var status = $("#ustatus").val();
      var unp = /^[a-zA-Z0-9 ]+$/;
      var np = /^[a-zA-Z ]+$/;
      var ep = /[a-zA-Z0-9]+\@gmail.com$/;
      var mp = /^[9876][0-9]{9}$/;

      if (uname == "" || !uname.match(unp)) 
      {
        //alert();
        $("#uname").focus();
        $("#uname").after("<small class='text-danger' id='error'>Enter username(Special charecter not allow).</small>");
        return false;
      }
      else if (ufname == "" || !ufname.match(np)) 
      {
        //alert();
        $("#ufname").focus();
        $("#ufname").after("<small class='text-danger' id='error'>Enter full name(only text allow).</small>");
        return false;
      }
      else if (gender1==false && gender2==false)
      {
         $(".ugender").append("<small class='text-danger' id='error'><br>Please select the gender.</small>");
         return false;
      }
      else if (email == "" || !email.match(ep)) 
      {
        //alert();
        $("#uemail").focus();
        $("#uemail").after("<small class='text-danger' id='error'>Enter valid email address ex.abc@gmail.com.</small>");
        return false;
      }
      else if (mobile == "" || !mobile.match(mp)) 
      {
        //alert();
        $("#umobile").focus();
        $("#umobile").after("<small class='text-danger' id='error'>Enter valid mobile number ex.9876543210.</small>");
        return false;
      }
      else if (pass == "" || pass.length < 4) 
      {
        //alert();
        $("#upass").focus();
        $("#upass").after("<small class='text-danger' id='error'>Set password.</small>");
        return false;
      }
      else if (role == "") 
      {
        //alert();
        $("#urole").focus();
        $(".urole").append("<small class='text-danger' id='error'>select the role.</small>");
        return false;
      }
      else if (photo == "") 
      {
        //alert();
        $("#uphoto").focus();
        $("#uphoto").after("<small class='text-danger' id='error'>select the Photo.</small>");
        return false;
      }
      else if (status == "") 
      {
        //alert();
        $("#ustatus").focus();
        $(".ustatus").append("<small class='text-danger' id='error'>Select Admin Status.</small>");
        return false;
      }
    }
  </script>