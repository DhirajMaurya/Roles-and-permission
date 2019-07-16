<?php
class RegisterController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("RegisterModel");
		$data=$this->RegisterModel->check_data();
		if(count($data) > 0)
		{
			redirect("LoginController");
		}
	}
	public function index()
	{
		$data['title'] = "| Admin | First Time Register";
		$this->load->view("register",$data);
	}
	public function register()
	{
		$this->load->model("RegisterModel");
		$this->RegisterModel->register();
		redirect("LoginController");
	}
}
?>