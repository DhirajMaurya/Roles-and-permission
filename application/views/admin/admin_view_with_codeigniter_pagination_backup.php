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
        Manage Admin
        <!-- <small>advanced tables</small> -->
        <a href="<?php echo site_url().'AdminController/admin_add/';?>" class="btn btn-md btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Add Admin</a>
      </h1>

      <!-- <ol class="breadcrumb">
        
        <li><a href="<?php echo site_url().'Dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header form-inline">
              <div class="col-md-4">
              <!-- <select class="form-control select2" name="num_records" id="num_records" onchange="num_records(this.value)">
                <option value="10">10</option>
                <option value="15" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']==15)?'selected':'';}?>>15</option>
                <option value="20" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']==20)?'selected':'';}?>>20</option>
                <option value="100" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']==100)?'selected':'';}?>>100</option>
                <option value="-1" <?php if(isset($_GET['show_records'])) { echo ($_GET['show_records']=='-1')?'selected':'';}?>>All</option>
              </select> -->
              </div>
              <!-- <div class="col-md-4">
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
                $to = 10;//min( ($page_no * $per_page_record), $show_total_records );
                ?>
                Showing <?php echo($from);?> to <?php echo($to);?> of <?php // echo($show_total_records);?> entries
              </div> -->
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
              <div class="table-responsive" id="postsList">
              <table class="table table-bordered table-striped">
                <thead class="bg-gray">
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Gender</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Mobile</th>
                  <th class="text-center">Role</th>
                  <!-- <th class="text-center">Permission</th> -->
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody id="scrolling_data">
              <?php
              if(!empty($data))
              {
                foreach($data as $data)
                {
                ?>
                <tr>
                  <td class="text-center"><?php echo $data->Uid;?></td>
                  <td><?php echo $data->Uusername;?></td>
                  <td><?php echo $data->Uname;?></td>
                  <td><?php 
                      if($data->Ugender == 1){ echo "Male"; } 
                      else if($data->Ugender == 2){ echo "Female"; } ?>
                  </td>
                  <td class="text-center">
                    <img src="<?php echo base_url().'imagesbook/admin_photo/'.$data->Uphoto;?>" style="cursor: pointer;" width="60" id="eimage_<?php echo($data->Uid)?>" onclick="full_view('<?php echo($data->Uid)?>','<?php echo($data->Uname)?>')">
                  </td>
                  <td><?php echo $data->Uemail;?></td>
                  <td><?php echo $data->Umobile;?></td>
                  <td><?php
                      /*if($data->Roleid == 1){ echo "Super Admin"; } 
                      else if($data->Roleid == 2){ echo "Sub Admin"; }
                      else if($data->Roleid == 3){ echo "User Account"; }*/
                      echo($data->Rolename);
                      ?>
                  </td>
                  <!-- <td>Allow Permission</td> -->
                  <td id="status_<?php echo($data->Uid);?>" class="text-center">
                  <?php 
                  if($data->Ustatus==1)
                  {
                  ?>
                    <button title="Active" class="btn btn-success btn-sm" onclick="status('<?php echo($data->Uid)?>')"><span class="glyphicon glyphicon-ok-circle" style="font-size: 20px"></span></button>
                  <?php
                  }
                  else
                  {
                  ?>
                    <button title="Deactive" class="btn btn-danger btn-sm" onclick="status('<?php echo($data->Uid)?>')"><span class="glyphicon glyphicon-remove-circle" style="font-size: 20px"></span></button>
                  <?php
                  }
                  ?>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo site_url().'AdminController/admin_edit/'.$data->Uid;?>" title="Edit"><i class="fa fa-fw fa-edit" style="font-size: 20px"></i></a> | 
                    <a title="Delete" onclick="delete_record('<?php echo($data->Uid)?>')"><i class="fa fa-fw fa-trash" style="font-size: 20px;cursor: pointer;"></i></a> | 
                    <a title="Delails" onclick="admin_details('<?php echo($data->Uid)?>')"><i class="fa fa-info-circle" style="font-size: 20px;cursor: pointer;"></i></a>
                  </td>
                </tr>

                <?php
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
              </table>
            <div id="loader-icon" style="left: 0;top: 40%;width:100%;height:100%;text-align:center;display:none;">
              <img src="<?php echo base_url().'imagesbook/loading/';?>loader11.gif" width="120px"/>
            </div>
            <div id='pagination'></div>
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
<script src="<?php echo base_url();?>template/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- /.content-wrapper -->
  <script>

    $(document).ready(function() {
      $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        loadPagination(pageno);
      });
      loadPagination(0);
      function loadPagination(pagno){
        $.ajax({
          url: "<?php echo site_url().'AdminController/loadRecord/'?>"+pagno,
          type: 'get',
          dataType: 'json',
          success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
          }
        });
      }
      function createTable(result,sno){
       sno = Number(sno);
       $('#postsList tbody').empty();
       for(index in result){
          var id = result[index].Uid;
          var uname = result[index].Uusername;
          var name = result[index].Uname;
          var gender = result[index].Ugender;
          var photo = result[index].Uphoto;
          var email = result[index].Uemail;
          var mobile = result[index].Umobile;
          var role = result[index].Roleid;
          var status = result[index].Ustatus;
          //var content = result[index].slug;
          //content = content.substr(0, 60) + " ...";
          //var link = result[index].slug;
          sno+=1;
          if(gender==1)
          {
            g = 'Male';
          }
          else
          {
            g = 'Female';
          }
          if(status==1)
                  {
                    st = "<button title='Active' class='btn btn-success btn-sm' onclick='status("+ id +")'><span class='glyphicon glyphicon-ok-circle' style='font-size: 20px'></span></button>";
                  }
                  else
                  {
                    st = "<button title='Deactive' class='btn btn-danger btn-sm' onclick='status("+ id +")'><span class='glyphicon glyphicon-remove-circle' style='font-size: 20px'></span></button>";
                  }

          var tr = "<tr>";
          tr += "<td class='text-center'>"+ id +"</td>";
          tr += "<td>"+ uname +"</td>";
          tr += "<td>"+ name +"</td>";
          tr += "<td>"+ g +"</td>";
          var n = '"'+name+'"';
          // alert(n);
          //tr += "<td><img src='<?php echo site_url();?>imagesbook/admin_photo/"+ photo +"' width='60px' ></td>";
          tr += "<td class='text-center'><img src='<?php echo site_url();?>imagesbook/admin_photo/"+ photo +"' width='60px' id='eimage_"+id+"' onclick='full_view("+ id +","+ n +")'></td>";
          
          tr += "<td>"+ email +"</td>";
          tr += "<td>"+ mobile +"</td>";
          tr += "<td>"+ role +"</td>";
          tr += "<td id='status_"+ id +"' class='text-center'>"+ st +"</td>";
          tr += "<td class='text-center'>"+
                    "<a href='<?php echo site_url().'AdminController/admin_edit/';?>"+ id +"' title='Edit'><i class='fa fa-fw fa-edit' style='font-size: 20px'></i></a> |"+ 
                    "<a title='Delete' onclick='delete_record("+ id +")'><i class='fa fa-fw fa-trash' style='font-size: 20px;cursor: pointer;'></i></a> |"+ 
                    "<a title='Delails' onclick='admin_details("+ id +")'><i class='fa fa-info-circle' style='font-size: 20px;cursor: pointer;'></i></a>"+
                "</td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);
  
        }
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
                  url:"<?php echo site_url().'AdminController/admin_status/' ?>"+id,
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
                url:"<?php echo site_url().'AdminController/admin_delete/';?>"+id,
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
      var new_url = "<?php echo site_url().'AdminController/emp_view?show_records=';?>"+records+'&ename='+ename+'&egender='+egender+'&edesignation='+edesignation+'&estatus='+estatus+'&equalification='+equalification+'&eexperience='+eexperience;
      window.location.href = new_url;
      }
      else
      {
        var new_url = "<?php echo site_url().'AdminController/emp_view?show_records='; ?>"+records;
        window.location.href = new_url;
      }
    }

    function admin_details(id)
    {
      $.ajax({
                url:"<?php echo site_url().'AdminController/admin_details/'?>"+id,
                success:function(res){
                  
                  //alert(res)
                  $("#modal-default").modal('show');
                  $("#modal-default").html(res);
                }
      });
    }
  </script>