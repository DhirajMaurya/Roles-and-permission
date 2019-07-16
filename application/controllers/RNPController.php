<?php
class RNPController extends CI_Controller
{
	var $perm = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('RNPModel');
		$this->load->model('CommanModel');
		$this->perm = $this->CommanModel->permission();
	}
	public function view_roles()
	{
		if (in_array("view_roles", $this->perm))
  		{
			$data['title'] = "| Roles List |";
			$data['data']=$this->RNPModel->view_roles();
			$this->load->view('header',$data);
			$this->load->view('sidemenu');
			$this->load->view('rnp/roles',$data);
			$this->load->view('footer');
		}
		else
		{
			$this->session->set_flashdata('emessage','Permission not allow.');
			redirect('Dashboard');
		}
	}

	public function view_permission()
	{
		if (in_array("view_permission", $this->perm))
  		{
			$data['title'] = "| Permission List |";
			$data['data']=$this->RNPModel->view_permission();
			$this->load->view('header',$data);
			$this->load->view('sidemenu');
			$this->load->view('rnp/permission',$data);
			$this->load->view('footer');
		}
		else
		{
			$this->session->set_flashdata('emessage','Permission not allow.');
			redirect('Dashboard');
		}	
	}
	public function add_role()
	{
		$data['data']=$this->RNPModel->add_role();
		redirect('RNPController/view_roles');
	}
	public function delete_role($id)
	{
		$data['data']=$this->RNPModel->delete_role($id);	
	}
	public function add_permission()
	{
		$data['data']=$this->RNPModel->add_permission();
		redirect('RNPController/view_permission');
	}
	public function delete_permission($id)
	{
		$data['data']=$this->RNPModel->delete_permission($id);
	}
}
?>