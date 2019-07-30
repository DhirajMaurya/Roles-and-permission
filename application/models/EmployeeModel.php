<?php
class EmployeeModel extends CI_Model
{
	public function export()
	{
		return $this->db->get('employee')->result();
	}
	public function import($data)
	{
		/*foreach ($data as $single) 
		{
			$edata=$this->db->get_where('employee',['Emobile' => $single['Emobile']])->row();
		*/	if(!empty($data)){
				$this->db->insert_batch('employee',$data);
			}
		//}
		return $this->db->insert_id('employee');

	}
	public function get_current_page_records($limit,$start,$per)
	{
		if(isset($_GET['ename']))
		{
			extract($_GET);
			if($ename!="" || $egender!="" || $eexperience!="" || $edesignation!="" || $equalification!="" || $estatus!="")
			{
				if ($eexperience!="") 
				{
					if($per != -1){	$this->db->limit($limit,$start); }
					$this->db->like('Ename',$ename);
					$this->db->like('Egender',$egender,'after');
					$this->db->where('Eexperience',$eexperience);
					$this->db->like('Edesignation',$edesignation,'after');
					$this->db->like('Equalification',$equalification,'after');
					$this->db->like('Estatus',$estatus,'after');
					// return $this->db->get('employee')->result();
					if($per != -1){
						return $this->db->get('employee')->result();
					}
					else
					{
						$this->db->from('employee');
						return $this->db->count_all_results('');
					}
				}
				else
				{
					if($per != -1){	$this->db->limit($limit,$start); }
					// $this->db->limit($limit,$start);
					$this->db->like('Ename',$ename);
					$this->db->like('Egender',$egender,'after');
					$this->db->like('Eexperience',$eexperience,'after');
					$this->db->like('Edesignation',$edesignation,'after');
					$this->db->like('Equalification',$equalification,'after');
					$this->db->like('Estatus',$estatus,'after');
					// return $this->db->get('employee')->result();
					if($per != -1){
						return $this->db->get('employee')->result();
					}
					else
					{
						$this->db->from('employee');
						return $this->db->count_all_results('');
					}
				}
			}
			else
			{
				// $this->db->limit($limit,$start);
				if($per != -1){	$this->db->limit($limit,$start); }
				$this->db->order_by('Edateregister','DESC');
				// return $this->db->get('employee')->result();
				if($per != -1){
					return $this->db->get('employee')->result();
				}
				else
				{
					return $this->db->count_all('employee');
				}
			}
		}
		else
		{
			// $this->db->limit($limit,$start);
			if($per != -1){	$this->db->limit($limit,$start); }
			$this->db->order_by('Edateregister','DESC');
			if($per != -1){
				return $this->db->get('employee')->result();
			}
			else
			{
				return $this->db->count_all('employee');
			}
		}
	}
	
	public function emp_insert($joinletter)
	{
		extract($_POST);
		$hobby=implode(',', $ehobby);

		$config['upload_path']          = './imagesbook/emp/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']			= TRUE;
       /* $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;*/

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('ephoto'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = $this->upload->data();
                $image = $data['file_name'];
        }

        $fdate=date("Y-m-d",strtotime($edob));
		$insert = array(
						"Ename" => $ename,
						"Egender"=>$egender,
						"Edob"=>$fdate,
						"Edesignation"=>$edesignation,
						"Epost"=>$epost,
						"Ehobby"=>$hobby,
						"Eemail"=>$eemail,
						"Emobile"=>$emobile,
						"Epassword"=>md5($epass),
						"Ephoto"=>$image,
						"Eaddress"=>$eaddress,
						"Equalification"=>$equalification,
						"Eexperience"=>$eexperience,
						"Ejoindate"=>date("Y-m-d",strtotime($edoj)),
						"Ejoinletter"=>$joinletter,
						"Edateregister"=>date('Y-m-d H:i:s'),
						"Estatus"=>$estatus
						);
		$this->db->insert("employee",$insert);
	}
	public function emp_delete($id)
	{
		$this->db->where("Eid",$id);
		$data=$this->db->get("employee")->row();
		unlink("imagesbook/emp/".$data->Ephoto);
		unlink("joiningletter/".$data->Ejoinletter);

		$this->db->where("Eid",$id);
		$this->db->delete("employee");
	}
	public function emp_status($id)
	{
		$this->db->where("Eid",$id);
		$data=$this->db->get("employee")->row();
		$updatedate = date('Y-m-d H:i:s');
		if($data->Estatus==1)
		{
			$update=array("Estatus"=>"0","Eupdatedate"=>$updatedate);
		}
		else
		{
			$update=array("Estatus"=>"1","Eupdatedate"=>$updatedate);
		}	
		$this->db->where("Eid",$id);
		$this->db->update("employee",$update);
		$this->db->where("Eid",$id);
		return $this->db->get('employee')->row();

	}
	public function emp_edit($id)
	{
		$this->db->where("Eid",$id);
		return $this->db->get("employee")->row();
	}

	public function emp_update($id)
	{
		extract($_POST);
		$hobby=implode(',', $ehobby);

		$config['upload_path']          = './imagesbook/emp/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']			= TRUE;
       /* $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;*/

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('ephoto'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = $this->upload->data();
                $image = $data['file_name'];
        }

        if($epass==$enpass)
        {
        	$new_pass = $epass;
        }
        else
        {
        	$new_pass = md5($enpass);
        }

        $fdate=date("Y-m-d",strtotime($edob));
		if($_FILES['ephoto']['name']!="")
        {
        	$this->db->where("Eid",$id);
			$data=$this->db->get("employee")->row();
			unlink("imagesbook/emp/".$data->Ephoto);

			$update = array(
						"Ename" => $ename,
						"Egender"=>$egender,
						"Edob"=>$fdate,
						"Edesignation"=>$edesignation,
						"Epost"=>$epost,
						"Ehobby"=>$hobby,
						"Eemail"=>$eemail,
						"Emobile"=>$emobile,
						"Epassword"=>$new_pass,
						"Ephoto"=>$image,
						"Eaddress"=>$eaddress,
						"Equalification"=>$equalification,
						"Eexperience"=>$eexperience,
						"Eupdatedate"=>date('Y-m-d H:i:s'),
						"Estatus"=>$estatus
						);
		}
		else
		{
			$update = array(
						"Ename" => $ename,
						"Egender"=>$egender,
						"Edob"=>$fdate,
						"Edesignation"=>$edesignation,
						"Ehobby"=>$hobby,
						"Eemail"=>$eemail,
						"Emobile"=>$emobile,
						"Epassword"=>$new_pass,
						"Eaddress"=>$eaddress,
						"Equalification"=>$equalification,
						"Eexperience"=>$eexperience,
						"Eupdatedate"=>date('Y-m-d H:i:s'),
						"Estatus"=>$estatus
						);
		}
		$this->db->where("Eid",$id);
		$this->db->update("employee",$update);
	}
	public function emp_details($id)
	{
		$this->db->where("Eid",$id);
		return $this->db->get('employee')->row();		
	}
}
?>