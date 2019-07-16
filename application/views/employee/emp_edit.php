
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee
      
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
              <h3 class="box-title">Update Employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url().'EmployeeController/emp_update/'.$edit_data->Eid;?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ename">Full Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="ename" name="ename" placeholder="Enter full name" value="<?php echo $edit_data->Ename;?>">
                    </div>
                    <div class="form-group" id="herror">
                      <label>Select hobbies <span class="text-danger">*</span></label>
                      <div class="form-control">
                      <?php
                      if($edit_data->Ehobby == "Reading,Writing,Music")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      else if($edit_data->Ehobby == "Reading,Writing")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      else if($edit_data->Ehobby == "Reading,Music")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      else if($edit_data->Ehobby == "Writing,Music")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      else if($edit_data->Ehobby == "Reading")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      else if($edit_data->Ehobby == "Writing")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      else if($edit_data->Ehobby == "Music")
                      {
                      ?>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby1" value="Reading">Reading
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" id="ehobby2" value="Writing">Writing
                      </label>
                      <label style="margin-right: 10%;">
                        <input type="checkbox" class="minimal" name="ehobby[]" checked id="ehobby3" value="Music">Music
                      </label>
                      <?php
                      }
                      ?>
                      </div>
                    </div>
                    <div class="form-group edesignation">
                      <label>Designation <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="edesignation" id="edesignation">
                        <option value="">select</option>
                        <option value="Manager" <?php echo ($edit_data->Edesignation=="Manager")?'selected':''; ?> >Manager</option>
                        <option value="Team Leader" <?php echo ($edit_data->Edesignation=="Team Leader")?'selected':''; ?> >Team Leader</option>
                        <option value="Team Member" <?php echo ($edit_data->Edesignation=="Team Member")?'selected':''; ?> >Team Member</option>
                        <option value="Clark" <?php echo ($edit_data->Edesignation=="Clark")?'selected':''; ?> >Clark</option>
                      </select>
                    </div>                    
                    <div class="form-group">
                      <label for="emobile">Mobile <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="emobile" name="emobile" placeholder="Enter mobile ex.9876543210" value="<?php echo $edit_data->Emobile;?>">
                    </div>
                    <div class="form-group">
                      <label for="ephoto">Photo <span class="text-danger">*</span></label>
                      
                      <div class="table-bordered" id="photo_close">
                        <img src="<?php echo base_url().'imagesbook/emp/'.$edit_data->Ephoto;?>" style="height: 100px;">
                        <span style="font-size: 24px;cursor: pointer;" onclick="update_image()">X</span>
                      </div>
                      <img src="" id="view_ph" style="height: 100px;">
                      <!-- <p class="help-block">Example block-level help text here.</p> -->
                    </div>
                    <div class="form-group equalification">
                      <label>Qualification <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="equalification" id="equalification">
                        <option value="">select</option>
                        <option value="10th" <?php echo ($edit_data->Equalification=="10th")?'selected':''; ?> >10th</option>
                        <option value="10+2th" <?php echo ($edit_data->Equalification=="10+2th")?'selected':''; ?> >10+2th</option>
                        <option value="Graduation" <?php echo ($edit_data->Equalification=="Graduation")?'selected':''; ?> >Graduation</option>
                        <option value="Post Graduation" <?php echo ($edit_data->Equalification=="Post Graduation")?'selected':'';?> >Post Graduation</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="epass">Experience <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="eexperience" name="eexperience" placeholder="Enter Experience between(0-15)Years" value="<?php echo $edit_data->Eexperience;?>" max="15" min="0">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Gender <span class="text-danger">*</span></label>
                      <div class="form-inline form-control">
                      <div class="radio" style="margin-right: 10%;">
                        <label>
                          <input type="radio" name="egender" class="flat-red" id="egender1" value="1" <?php echo ($edit_data->Egender==1)?'checked':''; ?> >
                          Male
                        </label>
                      </div>
                      <div class="radio" style="margin-right: 10%;">
                        <label>
                          <input type="radio" name="egender" class="flat-red" id="egender2" value="2" <?php echo ($edit_data->Egender==2)?'checked':''; ?> >
                          Female
                        </label>
                      </div>
                      <div class="radio" id="gerror">
                        <label>
                          <input type="radio" name="egender" class="flat-red" id="egender3" value="3" <?php echo ($edit_data->Egender==3)?'checked':''; ?> >
                          Other
                        </label>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Date of Birth <span class="text-danger">*</span></label>

                      <div class="input-group date edob">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="edob" id="datepicker" value="<?php echo date('m-d-Y',strtotime($edit_data->Edob));?>">
                      </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group epost">
                      <label>Post of position <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="epost" id="epost">
                        <option value="">select</option>
                        <option value="Android Developer" <?php echo ($edit_data->Epost=="Android Developer")?'selected':''; ?> >Android Developer</option>
                        <option value="DotNet Developer" <?php echo ($edit_data->Epost=="DotNet Developer")?'selected':''; ?> >DotNet Developer</option>
                        <option value="Graphics Designer" <?php echo ($edit_data->Epost=="Graphics Designer")?'selected':''; ?> >Graphics Designer</option>
                        <option value="iOS Developer" <?php echo ($edit_data->Epost=="iOS Developer")?'selected':''; ?> >iOS Developer</option>
                        <option value="PHP Developer" <?php echo ($edit_data->Epost=="PHP Developer")?'selected':''; ?> >PHP Developer</option>
                        <option value="Web Designer" <?php echo ($edit_data->Epost=="Web Designer")?'selected':''; ?> >Web Designer</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="eemail">Email address <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="eemail" name="eemail" placeholder="Enter email" value="<?php echo $edit_data->Eemail;?>">
                    </div>
                    <div class="form-group">
                      <label for="epass">Password <span class="text-danger">*</span></label>
                      <input type="hidden" class="form-control" name="epass" placeholder="Enter password" value="<?php echo $edit_data->Epassword;?>">
                      <input type="password" class="form-control" id="epass" name="enpass" placeholder="Enter new password" autocomplete="off" value="<?php echo $edit_data->Epassword ?>">
                    </div>
                    <div class="form-group">
                      <label>Address <span class="text-danger">*</span></label>
                      <textarea class="form-control" rows="5" id="eaddress" name="eaddress" placeholder="Enter address"><?php echo $edit_data->Eaddress;?></textarea>
                    </div>
                    <div class="form-group estatus">
                      <label>Status <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="estatus" id="estatus">
                        <option value="">select</option>
                        <option value="1" <?php echo ($edit_data->Estatus==1)?'selected':''; ?>>Active</option>
                        <option value="0" <?php echo ($edit_data->Estatus==0)?'selected':''; ?>>Deactive</option>
                      </select>
                    </div>

                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo site_url().'EmployeeController/emp_view/';?>" class="btn btn-danger" style="margin-right: 20px">Back</a>
                <button type="submit" onclick="return validation();" class="btn btn-primary">Update</button>
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
        /*$('#datepicker1').datepicker({
            format: 'dd-mm-yyyy',
            startDate: 'today',
            //endDate: 'today',
            clearBtn: true
        });*/
    });

    function view_photo(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#view_ph').attr('src', e.target.result);
              $("#view_ph").addClass('img img-thumbnail');
              $("#error").remove();
          }
          
          reader.readAsDataURL(input.files[0]);
      }
    }
    function update_image()
    {
      $("#photo_close").hide();
      $("#photo_close").after("<input type='file' id='ephoto' name='ephoto' class='form-control'  onchange='view_photo(this)'>");
    }
    function validation()
    {
      $("#error").remove();
      var name = $("#ename").val();
      var egender1 = $("#egender1").is(":checked");
      var egender2 = $("#egender2").is(":checked");
      var egender3 = $("#egender3").is(":checked");
      var dob = $("#datepicker").val();
      var designation = $("#edesignation").val();
      var post = $("#epost").val();
      var ehobby1 = $("#ehobby1").is(":checked");
      var ehobby2 = $("#ehobby2").is(":checked");
      var ehobby3 = $("#ehobby3").is(":checked");
      var ehobby4 = $("#ehobby4").is(":checked");
      var email = $("#eemail").val();
      var mobile = $("#emobile").val();
      var pass = $("#epass").val();
      var photo = $("#ephoto").val();
      var address = $("#eaddress").val();
      var qualification = $("#equalification").val();
      var experience = $("#eexperience").val();
      var status = $("#estatus").val();
      var tp = /^[a-zA-Z ]+$/;
      var ep = /[a-zA-Z0-9]+\@gmail.com$/;
      var mp = /^[9876][0-9]{9}$/;
     
      if (name == "" || !name.match(tp)) 
      {
        //alert();
        $("#ename").focus();
        $("#ename").after("<small class='text-danger' id='error'>Enter your full name(only text allow).</small>");
        return false;
      }
      else if (egender1==false && egender2==false && egender3==false)
      {
         $("#gerror").after("<small class='text-danger' id='error'><br>Please select your gender.</small>");
         return false;
      }
      else if (ehobby1==false && ehobby2==false && ehobby3==false && ehobby4==false)
      {
         $("#herror").after("<small class='text-danger' id='error'>Please select any one hoppy.</small>");
         return false;
      }
      else if (dob == "") 
      {
        //alert();
        $("#datepicker").focus();
        $(".edob").after("<small class='text-danger' id='error'>Please select Date of Birth.</small>");
        return false;
      }
      else if (designation == "") 
      {
        //alert();
        $("#edesignation").focus();
        $(".edesignation").append("<small class='text-danger' id='error'>Please select designation.</small>");
        return false;
      }
      else if (post == "") 
      {
        //alert();
        $("#epost").focus();
        $(".epost").append("<small class='text-danger' id='error'>Please select post.</small>");
        return false;
      }
      else if (mobile == "" || !mobile.match(mp)) 
      {
        //alert();
        $("#emobile").focus();
        $("#emobile").after("<small class='text-danger' id='error'>Enter your mobile number ex.9876543210.</small>");
        return false;
      }
      else if (email == "" || !email.match(ep)) 
      {
        //alert();
        $("#eemail").focus();
        $("#eemail").after("<small class='text-danger' id='error'>Enter your email address ex.abc@gmail.com.</small>");
        return false;
      }
      else if (photo == "") 
      {
        //alert();
        $("#ephoto").focus();
        $("#ephoto").after("<small class='text-danger' id='error'>select your Photo.</small>");
        return false;
      }
      else if (pass == "") 
      {
        //alert();
        $("#epass").focus();
        $("#epass").after("<small class='text-danger' id='error'>Set password.</small>");
        return false;
      }
      else if (qualification == "") 
      {
        //alert();
        $("#equalification").focus();
        $(".equalification").append("<small class='text-danger' id='error'>select your qualification.</small>");
        return false;
      }
      else if (address == "") 
      {
        //alert();
        $("#eaddress").focus();
        $("#eaddress").after("<small class='text-danger' id='error'>Enter your home address.</small>");
        return false;
      }
      else if (experience == "") 
      {
        //alert();
        $("#eexperience").focus();
        $("#eexperience").after("<small class='text-danger' id='error'>Enter your experience.</small>");
        return false;
      }
      else if (status == "") 
      {
        //alert();
        $("#estatus").focus();
        $(".estatus").append("<small class='text-danger' id='error'>Select Employee Status.</small>");
        return false;
      }
    }
  </script>