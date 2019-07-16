<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CommanModel');
		$this->CommanModel->permission();
	}
	public function index()
	{
		$data['title'] = "| Dashboard |";
		$this->load->view("header",$data);
		$this->load->view("sidemenu");
		$this->load->view("content");
		$this->load->view("footer");
	}
}

?>