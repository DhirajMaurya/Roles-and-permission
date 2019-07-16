<?php
class AdminController extends CI_Controller
{
	var $perm = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->model('CommanModel');
		$this->perm = $this->CommanModel->permission();
	}
	public function index()
	{
		$this->admin_list();
	}
	public function admin_list()
	{
		if (in_array("admin_list", $this->perm))
  		{
			$data['title'] = "| Admin List |";
			$data['data']=$this->AdminModel->admin_list();
			$this->load->view('header',$data);
			$this->load->view('sidemenu');
			$this->load->view('admin/admin_view',$data);
			$this->load->view('footer');
		}
		else
		{
			$this->session->set_flashdata('emessage','Permission not allow.');
			redirect('Dashboard');
		}
	}
	public function admin_add()
	{
		$data['title'] = "| Add New Admin |";
		$data['data']=$this->AdminModel->admin_list();
		$data['role_data']=$this->AdminModel->role_data();
		$data['perm_data']=$this->AdminModel->perm_data();
		$this->load->view('header',$data);
		$this->load->view('sidemenu');
		$this->load->view('admin/admin_add',$data);
		$this->load->view('footer');
	}
	public function admin_insert()
	{
		if (in_array("admin_insert", $this->perm))
  		{
			$this->AdminModel->admin_insert();
			redirect("AdminController/admin_list/");
		}
		else
		{

			$this->session->set_flashdata('emessage','Permission not allow.');
			redirect("AdminController/admin_list/");
		}
	}
	public function admin_delete($id)
	{
		if (in_array("admin_delete", $this->perm))
  		{
			$this->AdminModel->admin_delete($id);
			$this->session->set_flashdata('message','Successfully delete record...');
		}
		else
		{
			$this->session->set_flashdata('emessage','Permission not allow.');
		}
	}
	public function admin_status($id)
	{
		$data=$this->AdminModel->admin_status($id);
		if($data->Ustatus==1)
		{
			$response='<button title="Active" class="btn btn-success btn-sm" onclick="status('.$data->Uid.')"><span class="glyphicon glyphicon-ok-circle" style="font-size: 20px"></span></button>';
		}
		else
		{
			$response='<button title="Deactive" class="btn btn-danger btn-sm" onclick="status('.$data->Uid.')"><span class="glyphicon glyphicon-remove-circle" style="font-size: 20px"></span></button>';
		}
		echo $response;
	}
	public function admin_edit($id)
	{
		$data['edit_data']=$this->AdminModel->admin_edit($id);
		$data['title'] = "| Update Admin |";
		$data['role_data']=$this->AdminModel->role_data();
		$data['perm_data']=$this->AdminModel->perm_data();
		$data['user_perm']=$this->AdminModel->user_perm($id);
		$this->load->view("header",$data);
		$this->load->view("sidemenu");
		$this->load->view("admin/admin_edit",$data);
		$this->load->view("footer");
	}
	public function admin_update($id)
	{
		if (in_array("admin_update", $this->perm))
  		{
			$this->AdminModel->admin_update($id);
			redirect('AdminController/admin_list');
		}
		else
		{

			$this->session->set_flashdata('emessage','Permission not allow.');
			redirect("AdminController/admin_list/");
		}
	}
	public function admin_details($id)
	{
		$data['details'] = $this->AdminModel->admin_details($id);
		$this->load->view('admin/admin_details_model_page',$data);
	}
}
?>