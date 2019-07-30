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
              <select class="form-control select2" id="num_records" onchange="loadPagination(0,this.value)">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <!-- <option value="-1">All</option> -->
              </select>
              </div>
              <div class="col-md-4" id="show_records">
              </div>
              <div class="col-md-4 pagination" style="margin: 0;">
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
                <tbody>
                
                </tbody>
              </table>
              <input type="hidden" value="0" class="pageno">
              <input type="hidden" value="" class="totalpage">
              
            <div id="loader-icon" style="left: 0;top: 40%;width:100%;height:100%;text-align:center;display:none;">
              <img src="<?php echo base_url().'imagesbook/loading/';?>loader11.gif" width="120px"/>
            </div>
            <div class='pagination col-md-4 pull-right' style="margin: 0;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
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

  var limit = $('#num_records').val();
  $('.pagination').on('click','a',function(e){
    e.preventDefault(); 
    var limit = $('#num_records').val();
    var pageno = $(this).attr('data-ci-pagination-page');
    loadPagination(pageno,limit);
  });

  loadPagination(0,limit);

  function loadPagination(pageno,limit){
    // alert(limit);
    if(limit == -1)
    {
        $('#postsList tbody').empty('');
        $('.pagination').addClass('hide');
        $('#show_records').addClass('hide');
        $(window).scroll(function() {
          if($(window).scrollTop() == $(document).height() - $(window).height())
          {
            if($(".totalpage:last").val() != $(".pageno:last").val()) 
            {
              var pageno = parseInt($(".pageno:last").val()) + 1;
              $.ajax({
                url: "<?php echo site_url().'AdminController/loadRecord/'?>"+pageno+'/'+limit,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $('.pagination').html(response.pagination);
                    $('#show_records').html(response.show_records);
                  
                    createTable(response.result,response.pageno);
                    
                    $('#postsList').append(response.page_tpage);
                }
              });
            }
          }
        });
    }
    else
    {
      $('#show_records').removeClass('hide');
      $('.pagination').removeClass('hide');
      $.ajax({
        url: "<?php echo site_url().'AdminController/loadRecord/'?>"+pageno+'/'+limit,
        type: 'get',
        dataType: 'json',
        success: function(response){
          $('.pagination').html(response.pagination);
          $('#show_records').html(response.show_records);
          createTable(response.result,response.pageno);
        }
      });
    }
  }
  function createTable(result,sno){
   sno = Number(sno);
   if($('#num_records').val() != -1)
   {
      $('#postsList tbody').empty();
   }
   for(index in result){
      var id = result[index].Uid;
      var uname = result[index].Uusername;
      var name = result[index].Uname;
      var gender = result[index].Ugender;
      var photo = result[index].Uphoto;
      var email = result[index].Uemail;
      var mobile = result[index].Umobile;
      var role_name = result[index].Rolename;
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
      tr += "<td class='text-center'><img src='<?php echo site_url();?>imagesbook/admin_photo/"+ photo +"' width='60px' id='eimage_"+id+"' onclick='full_view("+ id +","+ n +")'></td>";
      
      tr += "<td>"+ email +"</td>";
      tr += "<td>"+ mobile +"</td>";
      tr += "<td>"+ role_name +"</td>";
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

  











    function full_view(id,name)
    {
      var data = $("#eimage_"+id).attr('src');
      $('#myModal').modal('show') 
      $('.modal-content').html("<img src='"+data+"' width='100%'' style='border:solid 5px #fff;'>"+"<span class='h3'>"+name+"</span>");
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

      var limit = $('#num_records').val();
      if(confirm('Do you want to delete the record.'))
      {
        $.ajax({
                url:"<?php echo site_url().'AdminController/admin_delete/';?>"+id,
                success:function(res)
                {
                    var pageno = $('.curlink span:last').text();
                    loadPagination(pageno,limit);
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