
<!-- <div class="modal fade" id="modal-default"> -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-uppercase"><?php echo $details->Uname; ?> ( <?php echo ($details->Ustatus==1)?'<span class="text-success">Active</span>':'<span class="text-danger">Deactive</span>'; ?> ) </h4>
      </div>
      <div class="modal-body" style="font-size: 18px;">
        <div class="row text-center">
          <img src="<?php echo base_url().'imagesbook/admin_photo/'.$details->Uphoto; ?>" width="250" class="img img-thumbnail img-circle">
        </div>
        <table class="table table-bordered table-striped">
          <tr>
            <th>User Id</th>
            <td><?php echo $details->Uid; ?></td>
          </tr>
          <tr>
            <th>User Username</th>
            <td><?php echo $details->Uusername; ?></td>
          </tr>
          <tr>
            <th>User Name</th>
            <td><?php echo $details->Uname; ?></td>
          </tr>
          <tr>
            <th>User Gender</th>
            <td><?php 
                if($details->Ugender==1){
                  echo "Male";
                }else if($details->Ugender==2){
                  echo "Female";
                } ?>
            </td>
          </tr>
          <tr>
            <th>User EmailId</th>
            <td><?php echo $details->Uemail; ?></td>
          </tr>
          <tr>
            <th>User Mobile No.</th>
            <td><?php echo $details->Umobile; ?></td>
          </tr>
          <tr>
            <th>User Role</th>
            <td><?php echo $details->Rolename; ?></td>
          </tr>
          <tr>
            <th>User Date Register</th>
            <td><?php echo date('d-m-Y H:i:s',strtotime($details->Uregisterdate)); ?></td>
          </tr>
          <tr>
            <th>User Modify Date</th>
            <td><?php echo ($details->Umodifydate == '0000-00-00 00:00:00')?'-':date('d-m-Y H:i:s',strtotime($details->Umodifydate)); ?></td>
          </tr>
          <tr>
            <th>User Permissions</th>
            <td><?php if(@$user_perm){ echo implode(', <br>',$user_perm); }else{ echo "-"; } ?></td>
          </tr>
        </table>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
<!-- </div> -->