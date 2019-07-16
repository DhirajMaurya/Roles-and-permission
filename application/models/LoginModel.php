<?php
class LoginModel extends CI_Model
{
	public function login()
	{
		$email=$this->input->post('lemail');
		$lpass=$this->input->post('lpass');
		$pass=md5($lpass);

		$this->db->where("Uemail",$email);
		// $this->db->or_where("Uusername",$email);
		$this->db->where("Upassword",$pass);
		return $this->db->get('user_login')->row();
	}
	public function check_data()
	{
		return $this->db->get("user_login")->result();
	}
}

?>