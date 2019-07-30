<?php
class AdminModel extends CI_Model
{
	public function role_data()
	{
		return $this->db->get('role')->result();
	}
	public function perm_data()
	{
		return $this->db->get('permission')->result();
	}
	/*public function admin_list()
	{
		$this->db->from('user_login');
		$this->db->join('role','user_login.Roleid=role.Roleid');
		return $this->db->get('')->result();
	}*/	

	public function limit_record($limit_per_page=0, $rowno=0, $action)
	{
		if($action==1)
		{
			$this->db->from('user_login');
			$this->db->join('role','user_login.Roleid=role.Roleid');
			return $this->db->order_by('Uid ASC')->get('',$limit_per_page,$rowno)->result();
		}
		else
		{
			return $this->db->count_all('user_login');
		}
	}

	public function admin_insert()
	{
		extract($_POST);
		$config['upload_path']          = './imagesbook/admin_photo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']			= TRUE;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('uphoto'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = $this->upload->data();
                $photo = $data['file_name'];
        }
		$insert = array(
						'Uusername'=>$uname,
						'Uname'=>$ufname,
						'Ugender'=>$ugender,
						'Uphoto'=>$photo,
						'Uemail'=>$uemail,
						'Umobile'=>$umobile,
						'Upassword'=>md5($upass),
						'Roleid'=>$urole,
						'Uregisterdate'=>date('Y-m-d H:i:s'),
						'Ustatus'=>$ustatus
						);

		$this->db->insert('user_login',$insert);
		$id = $this->db->insert_id();
		
		foreach ($perm as $perm) 
		{
			$insert = array(
					'Uid'=>$id,
					'Permid'=>$perm
				);
			$this->db->insert('user_perm',$insert);

		}

		
	}
	public function admin_delete($id)
	{
		$this->db->where("Uid",$id);
		$data=$this->db->get("user_login")->row();
		unlink("imagesbook/admin_photo/".$data->Uphoto);

		$this->db->where("Uid",$id);
		$this->db->delete("user_login");
	}
	public function admin_status($id)
	{
		$this->db->where("Uid",$id);
		$data=$this->db->get("user_login")->row();
		$updatedate = date('Y-m-d H:i:s');
		if($data->Ustatus==1)
		{
			$update=array("Ustatus"=>"0","Umodifydate"=>$updatedate);
		}
		else
		{
			$update=array("Ustatus"=>"1","Umodifydate"=>$updatedate);
		}	
		$this->db->where("Uid",$id);
		$this->db->update("user_login",$update);
		$this->db->where("Uid",$id);
		return $this->db->get('user_login')->row();

	}
	public function admin_edit($id)
	{
		$this->db->from('user_login');
		$this->db->where("user_login.Uid",$id);
		return $this->db->get('')->row();
	}
	public function user_perm($uid)
	{
		$this->db->from('permission');
		$this->db->join('user_perm','permission.Permid=user_perm.Permid');
		$this->db->where('user_perm.Uid',$uid);
		$data=$this->db->get('')->result();
		if(@$data){
			foreach ($data as $p) 
			{
				$perm[]=$p->Permdesc;
			}
			return $perm;
		}
	}

	public function admin_update($id)
	{
		extract($_POST);
		$config['upload_path']          = './imagesbook/admin_photo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']			= TRUE;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('uphoto'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = $this->upload->data();
                $photo = $data['file_name'];
        }

        if($upass == $oldpass)
        {
        	$new_pass = $oldpass;
        }
        else
        {
        	$new_pass = md5($upass);
        }

        if($_FILES['uphoto']['name']!="")
        {
				$update = array(
						'Uusername'=>$uname,
						'Uname'=>$ufname,
						'Ugender'=>$ugender,
						'Uphoto'=>$photo,
						'Uemail'=>$uemail,
						'Umobile'=>$umobile,
						'Upassword'=>$new_pass,
						'Roleid'=>$urole,
						'Uregisterdate'=>date('Y-m-d H:i:s'),
						'Umodifydate'=>date('Y-m-d H:i:s'),
						'Ustatus'=>$ustatus
						);
		}
		else
		{
				$update = array(
						'Uusername'=>$uname,
						'Uname'=>$ufname,
						'Ugender'=>$ugender,
						'Uemail'=>$uemail,
						'Umobile'=>$umobile,
						'Upassword'=>$new_pass,
						'Roleid'=>$urole,
						'Uregisterdate'=>date('Y-m-d H:i:s'),
						'Umodifydate'=>date('Y-m-d H:i:s'),
						'Ustatus'=>$ustatus
						);
		}
		$this->db->where('Uid',$id);
		$this->db->update('user_login',$update);

		$this->db->where('Uid',$id);
		$this->db->delete('user_perm');

		foreach ($perm as $perm) {
			$insert = array('Uid'=>$id,'Permid'=>$perm);
			$this->db->insert('user_perm',$insert);
		}
		
	}
	public function admin_details($id)
	{
		$this->db->from('user_login');
		$this->db->join('role','user_login.Roleid=role.Roleid');
		$this->db->where("Uid",$id);
		return $this->db->get('')->row();		
	}
}
?>