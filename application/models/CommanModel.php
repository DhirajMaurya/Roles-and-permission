<?php
class CommanModel extends CI_Model
{
	public function permission()
	{
		$id=$this->session->userdata('uid');
		//$this->db->from('user_login');
		$this->db->from('permission');
		$this->db->join('user_perm','permission.Permid=user_perm.Permid');
		$this->db->where('user_perm.Uid',$id);
		$allperm=$this->db->get('')->result();
		foreach ($allperm as $p) {
			$perm[]=$p->Permdesc;
		}
		$this->session->set_userdata('uperm',$perm);

		return $perm;
	}
}
?>