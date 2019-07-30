<?php
class LoginModel extends CI_Model
{
	public function login()
	{
		$email=$this->input->post('lemail');
		$lpass=$this->input->post('lpass');
		$pass=md5($lpass);

		//$this->db->where("Uemail",$email);
		// $this->db->or_where("Uusername",$email);
		//$this->db->where("Upassword",$pass);
		//return $this->db->get('user_login')->row();
		$sql="select * from user_login join role on user_login.Roleid=role.Roleid where (Uemail='$email' or Uusername='$email') and Upassword='$pass'";
		$query=$this->db->query($sql);
		return $query->row();
	}
	public function check_data()
	{
		return $this->db->get("user_login")->result();
	}
}

?>