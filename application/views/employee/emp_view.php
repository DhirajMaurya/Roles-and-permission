 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
      $message=$this->session->flashdata('message');
      if($message!="")
      {
      ?>
      <div class="alert alert-success alert-dismissible" id="alert_message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?php echo $message; ?>
      </div>
      <?php
      } 
      $emessage=$this->session->flashdata('emessage');
      if($emessage!="")
      {
      ?>
      <div class="alert alert-danger alert-dismissible" id="emessage">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?php echo $emessage; ?>
      </div>
      <?php
      } 
      ?>
      <h1>
        Employee
        <!-- <small>advanced tables</small> -->
        <a href="<?php echo site_url().'EmployeeController/emp_add/';?>" class="btn btn-md btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Add Employee</a>
      </h1>

      <!-- <ol class="breadcrumb">
        
        <li><a href="<?php echo site_url().'Dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Search</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
      <form action="<?php echo site_url().'EmployeeController/emp_view';?>">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <?php
                if(@$_GET['show_records'])
                {
                ?>
                  <input type="hidden" name="show_records" value="<?php echo $_GET['show_records']; ?>">
                <?php
                }
                ?>
                <label>Employee Name</label>
                <input type="text" name="ename" class="form-control" placeholder="Enter Employee Name." value="<?php if(isset($_GET['ename'])){echo($_GET['ename']!='')?$_GET['ename']:'';} ?>">
              </div>
              <div class="form-group">
                <label>Employee Gender</label>
                <select class="form-control select2" name="egender">
                  <option value="">Select</option>
                  <option value="1" <?php if(isset($_GET['egender'])){ echo($_GET['egender']==1)?'selected':'';} ?>>Male</option>
                  <option value="2" <?php if(isset($_GET['egender'])){ echo($_GET['egender']==2)?'selected':'';} ?>>Female</option>
                  <option value="3" <?php if(isset($_GET['egender'])){ echo($_GET['egender']==3)?'selected':'';} ?>>Other</option>
                </select>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3">
              <div class="form-group">
                  <label>Designation</label>
                  <select class="form-control select2" name="edesignation">
                    <option value="">select</option>
                    <option value="Manager" <?php if(isset($_GET['edesignation'])){ echo($_GET['edesignation']=='Manager')?'selected':'';} ?>>Manager</option>
                    <option value="Team Leader" <?php if(isset($_GET['edesignation'])){ echo($_GET['edesignation']=='Team Leader')?'selected':'';} ?>>Team Leader</option>
                    <option value="Team Member" <?php if(isset($_GET['edesignation'])){ echo($_GET['edesignation']=='Team Member')?'selected':'';} ?>>Team Member</option>
                    <option value="Clark" <?php if(isset($_GET['edesignation'])){ echo($_GET['edesignation']=='Clark')?'selected':'';} ?>>Clark</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Employee Status</label>
                  <select class="form-control select2" name="estatus">
                    <option value="">Select</option>
                    <option value="1" <?php if(isset($_GET['estatus'])){ echo($_GET['estatus']=='1')?'selected':'';} ?>>Active</option>
                    <option value="0" <?php if(isset($_GET['estatus'])){ echo($_GET['estatus']=='0')?'selected':'';} ?>>Deactive</option>
                  </select>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Education Qualification</label>
                <select class="form-control select2" name="equalification">
                    <option value="">select</option>
                    <option value="10th" <?php if(isset($_GET['equalification'])){ echo($_GET['equalification']=='10th')?'selected':'';} ?>>10th</option>
                    <option value="10+2th" <?php if(isset($_GET['equalification'])){ echo($_GET['equalification']=='10+2th')?'selected':'';} ?>>10+2th</option>
                    <option value="Graduation" <?php if(isset($_GET['equalification'])){ echo($_GET['equalification']=='Graduation')?'selected':'';} ?>>Graduation</option>
                    <option value="Post Graduation" <?php if(isset($_GET['equalification'])){ echo($_GET['equalification']=='Post Graduation')?'selected':'';} ?>>Post Graduation</option>
                  </select>
              </div>
              <div class="form-group">
                <button type="submit" style="margin-left: 80px;margin-top: 20px;" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Employee Experience(Year)</label>
                <input type="number" min="0" max="15" name="eexperience" class="form-control" placeholder="Enter Employee Experience.(0-15Years)" value="<?php if(isset($_GET['eexperience'])){ echo($_GET['eexperience']!='')?$_GET['eexperience']:'';} ?>">
              </div>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </form>
        <!-- <div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div> -->
      </div>
      <!-- /.box select2 close -->
   

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header form-inline">
              <div class="col-md-4">
              <select class="form-control select2" name="num_records" id="num_records" onchange="num_records(this.value)">
                <option value="10">10</option>
                <option value="15" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']==15)?'selected':'';}?>>15</option>
                <option value="20" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']==20)?'selected':'';}?>>20</option>
                <option value="100" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']==100)?'selected':'';}?>>100</option>
                <option value="-1" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']=='-1')?'selected':'';}?>>All</option>
              </select>
              </div>
              <div class="col-md-4">
                <?php
                if($this->uri->segment(3)=="")
                {
                  $page_no = 1;
                }
                else
                {
                  $page_no = $this->uri->segment(3);
                }

                if(@$_GET['show_records'])
                {
                  if($_GET['show_records']!='-1')
                  {
                    $per_page_record = $_GET['show_records'];
                  }
                  else
                  {
                    $per_page_record = 10;
                  }
                }
                else
                {
                  $per_page_record = 10;
                }
                
                $from = (($page_no * $per_page_record) - $per_page_record + 1);
                $to = min( ($page_no * $per_page_record), $show_total_records );
                ?>
                Showing <?php echo($from);?> to <?php echo($to);?> of <?php echo($show_total_records);?> entries
              </div>
              <div class="pull-right col-md-4">
                <?php 
                if(@$_GET['show_records'])
                {
                  if($_GET['show_records']!='-1')
                  {
                    if(isset($links)){ echo $links;  }
                  }
                }
                else
                {
                  if(isset($links)){ echo $links;  }
                }
                ?>                  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive" id="data_refresh">
              <table class="table table-bordered table-striped">
                <thead class="bg-gray">
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Gender</th>
                  <th class="text-center">Designation</th>
                  <!-- <th>Eemail</th> -->
                  <th class="text-center">Mobile</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Qualification</th>
                  <th class="text-center">Ex.(Years)</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody id="scrolling_data">
              <?php
              if(!empty($emp_data))
              {
                $i = $from;
                foreach($emp_data as $emp_data)
                {
                ?>
                <tr>
                  <td class="text-center"><?php echo $i;?></td>
                  <td><?php echo $emp_data->Ename;?></td>
                  <td><?php if($emp_data->Egender == 1){ echo "Male"; } 
                            else if($emp_data->Egender == 2){ echo "Female"; }
                            else{ echo "Other"; } ?></td>
                  <td><?php echo $emp_data->Edesignation;?></td>
                  <!-- <td><?php echo $emp_data->Eemail;?></td> -->
                  <td><?php echo $emp_data->Emobile;?></td>
                  <td class="text-center"><!-- <a href="<?php echo base_url().'imagesbook/emp/'.$emp_data->Ephoto;?>"> --><img src="<?php echo base_url().'imagesbook/emp/'.$emp_data->Ephoto;?>" style="cursor: pointer;" width="60" id="eimage_<?php echo($emp_data->Eid)?>" onclick="full_view('<?php echo($emp_data->Eid)?>','<?php echo($emp_data->Ename)?>')"></td>
                  <td><?php echo $emp_data->Equalification;?></td>
                  <td class="text-center"><?php echo $emp_data->Eexperience;?></td>
                  <td id="status_<?php echo($emp_data->Eid);?>" class="text-center">
                  <?php 
                  if($emp_data->Estatus==1)
                  {
                  ?>
                    <button title="Active" class="btn btn-success btn-sm" onclick="status('<?php echo($emp_data->Eid)?>')"><span class="glyphicon glyphicon-ok-circle" style="font-size: 20px"></span></button>
                    <!-- <a href="<?php echo site_url().'EmployeeController/status/'.$emp_data->Eid;?>" class="btn btn-sm btn-success">Active</a> -->
                  <?php
                  }
                  else
                  {
                  ?>
                    <button title="Deactive" class="btn btn-danger btn-sm" onclick="status('<?php echo($emp_data->Eid)?>')"><span class="glyphicon glyphicon-remove-circle" style="font-size: 20px"></span></button>
                    <!-- <a href="<?php echo site_url().'EmployeeController/status/'.$emp_data->Eid;?>" class="btn btn-sm btn-danger">Deactive</a> -->
                  <?php
                  }
                  ?>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo site_url().'EmployeeController/emp_edit/'.$emp_data->Eid;?>" title="Edit"><i class="fa fa-fw fa-edit" style="font-size: 20px"></i></a> | 
                    <a title="Delete" onclick="delete_record('<?php echo($emp_data->Eid)?>')"><i class="fa fa-fw fa-trash" style="font-size: 20px;cursor: pointer;"></i></a> | 
                    <a title="Delails" onclick="emp_details('<?php echo($emp_data->Eid)?>')"><i class="fa fa-info-circle" style="font-size: 20px;cursor: pointer;"></i></a>
                  </td>
                </tr>

                <?php
                $i++;
                }
              }
              else
              {
                ?>
                <tr>
                  <td colspan="18" class="text-center">Record is not fond...</td>
                </tr>
                <?php
              }
                ?>
                <input type="hidden" name="pagenum" class="pagenum" value="1">
                <input type="hidden" name="rowcount" class="rowcount" value="">
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Eid</th>
                  <th>Ename</th>
                  <th>Egender</th>
                  <th>Edob</th>
                  <th>Edesignation</th>
                  <th>Ehobby</th>
                  <th>Eemail</th>
                  <th>Emobile</th>
                  <th>Epassword</th>
                  <th>Ephoto</th>
                  <th>Eaddress</th>
                  <th>Equalification</th>
                  <th>Eexperience</th>
                  <th>Edateregister</th>
                  <th>Estatus</th>
                  <th>Action</th>
                </tr>
                </tfoot> -->
              </table>
            <div id="loader-icon" style="left: 0;top: 40%;width:100%;height:100%;text-align:center;display:none;">
              <img src="<?php echo base_url().'imagesbook/loading/';?>loader11.gif" width="120px"/>
            </div>
            <div style="margin: 20px 0;">
              <?php 
                if(@$_GET['show_records'])
                {
                  if($_GET['show_records']!='-1')
                  {
                    if(isset($links)){ echo $links;  }
                  }
                }
                else
                {
                  if(isset($links)){ echo $links;  }
                }
                ?>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <input type="hidden" name="" id="all_record" value="<?php echo (@$all_record)?$all_record :''; ?>">
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<div class="modal fade" id="modal-default">
</div>
<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content text-center" style="padding: 7px;">
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
  <!-- jQuery 3 -->
<script src="<?php echo base_url();?>template/bower_components/jquery/dist/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

    if($("#all_record").val() == 10)
    {
        //alert($("#all_record").val());
        // $('.pagination').addClass('hide');
        $(window).scroll(function() {

          if($(window).scrollTop() == $(document).height() - $(window).height())
          {

            $("#no-repeat").remove();
            if($(".rowcount:last").val() != $(".pagenum:last").val()) {
              var pagenum = parseInt($(".pagenum:last").val()) + 1;
              getresult(pagenum);
            }
            else
            {
              $('.rowcount:last').after('<td id="no-repeat" class="text-center h4" colspan="10" style="padding:20px;">No More Record...</td>');
            }
          }

        });
    }

    function getresult(pagenum)
    {

        var ename = GetParameterValues('ename');  
        var egender = GetParameterValues('egender');  
        var edesignation = GetParameterValues('edesignation');  
        var estatus = GetParameterValues('estatus');  
        var equalification = GetParameterValues('equalification');  
        var eexperience = GetParameterValues('eexperience');  
        //alert("Hello " + ename + " your gender is " + egender + ',' + edesignation + ','+estatus+','+equalification+','+eexperience);  
        function GetParameterValues(param) {  
            var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
            for (var i = 0; i < url.length; i++) {  
                var urlparam = url[i].split('=');  
                if (urlparam[0] == param) {  
                    return urlparam[1];  
                }  
            }  
        }  



      $.ajax({
            url:"<?php echo site_url().'EmployeeController/scrolling_data_get?page=';?>"+pagenum,
            method:"GET",
            data:{rowcount:$("#rowcount").val(),ename,egender,edesignation,estatus,equalification,eexperience},
            beforeSend: function(){
              $('#loader-icon').show();
            },
            complete: function(){
              $('#loader-icon').hide();
            },
            success:function(res){
             // alert(res);
              $('#scrolling_data').append(res);
            }
      });
    }

  });

    function full_view(id,name)
    {
      var data = $("#eimage_"+id).attr('src');
      $('#myModal').modal('show') 
      $('.modal-content').html("<img src='"+data+"' width='100%'' style='border:solid 5px #fff;'>"+"<span class='h3'>"+name+"</span>");
     // alert(data);
    }
    function status(id)
    {
      if(confirm('Do you want to change the status of record.'))
      {
        $.ajax({
                  url:"<?php echo site_url().'EmployeeController/emp_status/' ?>"+id,
                  success:function(res)
                  {
                    $("#status_"+id).html(res);
                    



                  }
        });
      }
    }
    function delete_record(id)
    {
      if(confirm('Do you want to delete the record.'))
      {
        $.ajax({
                url:"<?php echo site_url().'EmployeeController/emp_delete/';?>"+id,
                success:function(res)
                {
                  window.location.reload();
                }
        });
      }
    }
    function num_records(records)
    {

      var url = window.location.href;
   
      if (url.search("ename") != -1) 
      {
        var ename = GetParameterValues('ename');  
        var egender = GetParameterValues('egender');  
        var edesignation = GetParameterValues('edesignation');  
        var estatus = GetParameterValues('estatus');  
        var equalification = GetParameterValues('equalification');  
        var eexperience = GetParameterValues('eexperience');  
        function GetParameterValues(param) {  
            var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
            for (var i = 0; i < url.length; i++) {  
                var urlparam = url[i].split('=');  
                if (urlparam[0] == param) {  
                    return urlparam[1];  
                }  
            }  
      } 
      var new_url = "<?php echo site_url().'EmployeeController/emp_view?show_records=';?>"+records+'&ename='+ename+'&egender='+egender+'&edesignation='+edesignation+'&estatus='+estatus+'&equalification='+equalification+'&eexperience='+eexperience;
      window.location.href = new_url;
      }
      else
      {
        var new_url = "<?php echo site_url().'EmployeeController/emp_view?show_records='; ?>"+records;
        window.location.href = new_url;
      }
    }

    function emp_details(id)
    {
      $.ajax({
                url:"<?php echo site_url().'EmployeeController/emp_details/'?>"+id,
                success:function(res){
                  
                  //alert(res)
                  $("#modal-default").modal('show');
                  $("#modal-default").html(res);
                }
      });
    }
  </script>