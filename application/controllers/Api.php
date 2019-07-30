<?php
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller 
{

  function __construct()
  {
    parent::__construct();
    $auth_user = $this->config->item('rest_valid_logins');
    foreach ($auth_user as $key => $value) 
    {
      $username = $key;
      $password = $value;
    }

    if (@$_SERVER['PHP_AUTH_USER']==$username && $_SERVER['PHP_AUTH_PW']==$password) 
    {
      $data['status']=1;
      $data['message']='Successfully Authenticated User Login.';
      print_r($data);
      //$this->response($data);
    } 
    else 
    {
      header('WWW-Authenticate: Basic realm="REST API"');
      header('HTTP/1.0 401 Unauthorized');
      $data['status']=0;
      $data['message']='Enter username and password (only Authenticated User Access This API).';
      print_r($data);
      // $this->response($data);
      exit;
    }
    
  }

  //fatch data
  function view_employee_post()
  {
    $pageno=@$_POST['page'];
    $per_limit=@$_POST['per_limit'];

    $limit = ($per_limit!='') ? $per_limit : 10;
    $start = ($pageno) ? ($pageno - 1) : 0;
    $total_rocords = $this->db->count_all_results('employee');
    $employee_data = ($pageno!='') ? $this->db->get("employee",$limit,$start*$limit)->result_array() : $this->db->get("employee")->result_array();
      
    if($employee_data)
    {
      $data['status'] = 1;
      $data['message'] = 'Record Found'; 
      $data['TotalRecord'] = $total_rocords;            
      if(!empty($pageno))
      {
        $total_page=ceil($total_rocords/$limit);
        $data['LimitPerPageRecord'] = $limit;            
        $data['Form'] = (($pageno * $limit) - $limit + 1);            
        $data['To'] = min(($pageno * $limit),$total_rocords);            
        $data['CurrentPageno'] = $pageno;            
        $data['TotalPage'] = $total_page;            
      }
      $data['EmployeeDetails'] = $employee_data;            
      $this->response($data);   
    }
    else
    {
      $data['status'] = 0;
      $data['message'] = 'Record Not Found'; 
      $this->response($data);
    }        
  }
  
  //insert employee data
  function add_employee_post()
  {
    $input = $this->input->post();
    $Ephoto = @$_FILES['Ephoto']['name'];
    $Ejoinletter = @$_FILES['Ejoinletter']['name'];
    extract($_POST);
    if(@$Ename!='' && @is_numeric($Egender)!='' && @$Edob!='' && @$Edesignation!='' && @$Epost!='' && @$Ehobby!='' && @$Eemail!='' && @is_numeric($Emobile)!='' && @$Epassword!='' && $Ephoto!='' && @$Eaddress!='' && @$Equalification!='' && @is_numeric($Eexperience)!='' && @$Ejoindate!='' && $Ejoinletter!='' && @is_numeric($Estatus)!='')
    {
      $insert = array(
                      'Ename'=>$Ename,
                      'Egender'=>$Egender,
                      'Edob'=>$Edob,
                      'Edesignation'=>$Edesignation,
                      'Epost'=>$Epost,
                      'Ehobby'=>$Ehobby,
                      'Eemail'=>$Eemail,
                      'Emobile'=>$Emobile,
                      'Epassword'=>md5($Epassword),
                      'Ephoto'=>$Ephoto,
                      'Eaddress'=>$Eaddress,
                      'Equalification'=>$Equalification,
                      'Eexperience'=>$Eexperience,
                      'Ejoindate'=>$Ejoindate,
                      'Ejoinletter'=>$Ejoinletter,
                      'Edateregister'=>date('Y-m-d H:i:s'),
                      'Estatus'=>$Estatus
                      );
      $this->db->insert('employee',$insert);
      $data['status'] = 1;
      $data['message'] = 'Employee Added Successfully'; 
      $this->response($data);
    }
    else
    {
      $data['status'] = 0;
      $data['message'] = 'Enter proper require fields'; 
      $this->response($data);
    }

  } 
  //update records of employees  
  function update_employee_post()
  {
    $input = $this->input->post();
      if(@$input['Eid'] != '')
      {
        if(@$_FILES['Ejoinletter']['name'] != '')
        {
          $extra['Ejoinletter'] = $_FILES['Ejoinletter']['name'];
        }
        if (@$_FILES['Ephoto']['name'] != '') 
        {
          $extra['Ephoto'] = $_FILES['Ephoto']['name'];
        }
        if(@$input['Epassword']!='')
        {
          $extra['Epassword'] = md5($input['Epassword']);
        }
        $extra['Eupdatedate'] = date('Y-m-d H:i:s');

        $update = array_merge($input,$extra);
        $this->db->where('Eid',$input['Eid'])->update('employee',$update);

        if($this->db->affected_rows() > 0)
        {
            $data['status'] = 1;
            $data['message'] = 'Employee Data Updated Successfully'; 
            $this->response($data);
        }
        else
        {
            $data['status'] = 0;
            $data['message'] = 'Employee Data Can Not Updated'; 
            $this->response($data);
        }
      }
      else
      {
          $data['status'] = 0;
          $data['message'] = 'Enter proper require fields'; 
          $this->response($data);
      }
  }
     
// Delete Employee record
  public function delete_employee_post()
  {
    $input = $this->input->post();
    if(@is_numeric($input['Eid']) != '')
    {
      $this->db->where('Eid',$input['Eid']);
      $this->db->delete('employee');
      if($this->db->affected_rows())
      {
        $data['status'] = 1;
        $data['message'] = 'Employee Data Deleted Successfully'; 
        $this->response($data);
      }
      else
      {
        $data['status'] = 0;
        $data['message'] = 'Employee Id not exit in database'; 
        $this->response($data);
      }
    }
    else
    {
      $data['status'] = 0;
      $data['message'] = 'Enter proper require fields'; 
      $this->response($data);
    }
  }
}











/* if(@$input['Ename'] != '' && @$input['Egender'] != '' && @$input['Edob'] != '' && @$input['Edesignation'] != '' && @$input['Epost'] != '' && @$input['Ehobby'] != '' && @$input['Eemail'] != '' && @$input['Emobile'] != '' && @$input['Epassword'] != '' && @$input['Ephoto'] != '' && @$input['Eaddress'] != '' && @$input['Equalification'] != '' && @$input['Eexperience'] != '' && @$input['Ejoindate'] != '' && @$input['Ejoinletter'] != '' && @$input['Estatus'] != '')

------------------
      if(@$input['Ename']!='' && @is_numeric($input['Egender'])!='' && @$input['Epost']!= '' && @$input['Eemail']!='' && @is_numeric($input['Emobile'])!='' && @is_numeric($input['Eexperience'])!='' && @is_numeric($input['Estatus'])!='')
      {
          
          $photo=$_FILES['Ephoto']['name'];
          $letter=$_FILES['Ejoinletter']['name'];
          
          $whitelist = [$input['Ename'], $input['Egender'], $input['Edob'], $input['Edesignation'], $input['Epost'], $input['Ehobby'], $input['Eemail'], $input['Emobile'], $input['Eaddress'], $input['Equalification'], $input['Eexperience'], $input['Ejoindate'], $input['Estatus']];

          $filtered_data = array_intersect($input, $whitelist);
          $date = array('Epassword'=>md5($input['Epassword']),'Edateregister'=>date('Y-m-d H:i:s'),'Ephoto'=>$photo,'Ejoinletter'=>$letter);

          $insert = array_merge($filtered_data,$date);
          //print_r($insert);
          if($this->db->insert('employee',$insert))
          {
             $data['status'] = 1;
             $data['message'] = 'Employee Added Successfully'; 
             $this->response($data);
          }
          else
          {
              $data['status'] = 0;
              $data['message'] = 'Employee Can Not Added'; 
              $this->response($data);
          }
      }
      else
      {
          $data['status'] = 0;
          $data['message'] = 'Enter proper require fields'; 
          $this->response($data);
      }
    */