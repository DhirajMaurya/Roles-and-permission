
<!-- <div class="modal fade" id="modal-default"> -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-uppercase"><?php echo $emp_details->Ename; ?> ( <?php echo ($emp_details->Estatus==1)?'<span class="text-success">Active</span>':'<span class="text-danger">Deactive</span>'; ?> ) </h4>
      </div>
      <div class="modal-body" style="font-size: 18px;">
        <div class="row text-center">
          <img src="<?php echo base_url().'imagesbook/emp/'.$emp_details->Ephoto; ?>" width="250" class="img img-thumbnail img-circle">
        </div>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Employee Id</th>
            <td><?php echo $emp_details->Eid; ?></td>
          </tr>
          <tr>
            <th>Employee Name</th>
            <td><?php echo $emp_details->Ename; ?></td>
          </tr>
          <tr>
            <th>Employee Gender</th>
            <td><?php 
                if($emp_details->Egender==1){
                  echo "Male";
                }else if($emp_details->Egender==2){
                  echo "Female";
                }else if($emp_details->Egender==3){
                  echo "Other";
                } ?>
            </td>
          </tr>
          <tr>
            <th>Employee DOB</th>
            <td><?php echo date("d-m-Y",strtotime($emp_details->Edob)); ?></td>
          </tr>
          <tr>
            <th>Employee Designation</th>
            <td><?php echo $emp_details->Edesignation; ?></td>
          </tr>
          <tr>
            <th>Employee Post</th>
            <td><?php echo $emp_details->Epost; ?></td>
          </tr>
          <tr>
            <th>Employee Hobbies</th>
            <td><?php echo $emp_details->Ehobby; ?></td>
          </tr>
          <tr>
            <th>Employee EmailId</th>
            <td><?php echo $emp_details->Eemail; ?></td>
          </tr>
          <tr>
            <th>Employee Mobile No.</th>
            <td><?php echo $emp_details->Emobile; ?></td>
          </tr>
          <tr>
            <th>Employee Address</th>
            <td><?php echo $emp_details->Eaddress; ?></td>
          </tr>
          <tr>
            <th>Employee Qualification</th>
            <td><?php echo $emp_details->Equalification; ?></td>
          </tr>
          <tr>
            <th>Employee Experience</th>
            <td><?php echo ($emp_details->Eexperience==0)?'-':$emp_details->Eexperience.'-Year'; ?></td>
          </tr>
          <tr>
            <th>Employee DOJ</th>
            <td><?php echo date("d-m-Y",strtotime($emp_details->Ejoindate)); ?></td>
          </tr>
          <tr>
            <th>Employee Date Register</th>
            <td><?php echo date('d-m-Y H:i:s',strtotime($emp_details->Edateregister)); ?></td>
          </tr>
          <tr>
            <th>Employee Update Date</th>
            <td><?php echo ($emp_details->Eupdatedate == '0000-00-00 00:00:00')?'-':date('d-m-Y H:i:s',strtotime($emp_details->Eupdatedate)); ?></td>
          </tr>
          <tr>
            <th>Employee Offer Letter</th>
            <td><a href="<?php echo base_url().'joiningletter/'.$emp_details->Ejoinletter;?>"><i class="fa fa-fw fa-file-pdf-o"></i>Open</a></td>
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