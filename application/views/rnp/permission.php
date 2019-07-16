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
      ?>
      <h1>
        Permission  
        <!-- <small>advanced tables</small> -->
        <!-- <button class="btn btn-md btn-primary pull-right" onclick="add_role()">Add Role</button> -->
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Permission</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
      <form action="<?php echo site_url();?>RNPController/add_permission" method="post">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Permission Name</label>
                <input type="text" name="pname" class="form-control" placeholder="Enter permission Name." value="" required>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3">
              <div class="form-group">
                <button type="submit" style="margin-left: 0px;margin-top: 25px;" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Add</button>
              </div>
            </div>
           
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
              <div class="table-responsive" id="data_refresh">
              <table class="table table-bordered table-striped">
                <thead class="bg-gray">
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Permission Desc</th>
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
                  <td class="text-center"><?php echo $data->Permid;?></td>
                  <td><?php echo $data->Permdesc;?></td>
                  
                  <td class="text-center">
                    <!-- <a href="<?php echo site_url().'RNPController/'.$data->Uid;?>" title="Edit"><i class="fa fa-fw fa-edit" style="font-size: 20px"></i></a> |  -->
                    <a title="Delete" onclick="delete_record('<?php echo($data->Permid)?>')"><i class="fa fa-fw fa-trash" style="font-size: 20px;cursor: pointer;"></i></a>
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
  <!-- /.content-wrapper -->
  <script>

    
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
                url:"<?php echo site_url().'RNPController/delete_permission/';?>"+id,
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

  </script>