                <?php
                $i = $start;
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
                  <td class="text-center"><img src="<?php echo base_url().'imagesbook/emp/'.$emp_data->Ephoto;?>" style="cursor: pointer;" width="60" id="eimage_<?php echo($emp_data->Eid)?>" onclick="full_view('<?php echo($emp_data->Eid)?>','<?php echo($emp_data->Ename)?>')"></td>
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
                echo $fields;
                ?>