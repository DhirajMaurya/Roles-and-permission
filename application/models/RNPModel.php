<?php
class RNPModel extends CI_Model
{
	public function view_roles()
	{
		$this->db->order_by('Rolename','ASC');
		return $this->db->get('role')->result();
	}
	public function view_permission()
	{
		$this->db->order_by('Permdesc','ASC');
		return $this->db->get('permission')->result();
	}
	public function add_role()
	{
		$rname = $this->input->post('rname');
		$insert = array('Rolename'=>$rname);
		$this->db->insert('role',$insert);
	}
	public function delete_role($id)
	{
		$this->db->where('Roleid',$id);
		$this->db->delete('role');
	}
	public function add_permission()
	{
		$pname = $this->input->post('pname');
		$insert = array('Permdesc'=>$pname);
		$this->db->insert('permission',$insert);
	}
	public function delete_permission($id)
	{
		$this->db->where('Permid',$id);
		$this->db->delete('permission');
	}
}

?>