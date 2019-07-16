<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("LoginModel");
	}
	public function index()
	{
		$data['error']="";
		$data['check_data']=$this->LoginModel->check_data();
		$data['title'] = "| Admin | Login";
		$this->load->view('login',$data);
	}
	public function login()
	{
		$data=$this->LoginModel->login();
		if (!empty($data)) 
		{
			if($data->Ustatus==0)
			{
				$this->session->set_flashdata('message','Your Account is Block!!!');
				redirect('LoginController/');
			}
			else
			{
				$this->session->set_userdata('uid',$data->Uid);
				$this->session->set_userdata('uemail',$data->Uemail);
				$this->session->set_userdata('uname',$data->Uname);
				$this->session->set_userdata('uphoto',$data->Uphoto);
				$this->session->set_userdata('urole',$data->Roleid);
				redirect('Dashboard');
			}
		}
		else
		{
			$data['check_data']=$this->LoginModel->check_data();
			$data['title'] = "| Admin | Login";
			$data['error']="Invalid email and password.";
			$this->load->view("login",$data);
		}
	}
	
	public function logout()
	{/*
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('uemail');
		$this->session->unset_userdata('uname');
		$this->session->unset_userdata('uphoto');*/
		$this->session->sess_destroy();
		redirect("LoginController");
	}
	public function accountblock()
	{
		$this->load->view("account_block");
	}
}
