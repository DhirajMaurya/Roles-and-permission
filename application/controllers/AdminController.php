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
		$this->load->helper('captcha');
		// Folder path to be flushed 
		$folder_path = "./imagesbook/captcha/"; 
		// List of name of files inside 
		// specified folder 
		$files = glob($folder_path.'/*');  
		// Deleting all the files in the list 
		foreach($files as $file) { 
		    if(is_file($file))  
		        // Delete the given file 
		        unlink($file);  
		}
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
			/*$data['data']=$this->AdminModel->admin_list();
			$this->load->view('admin/admin_view',$data);*/
			$this->load->view('header',$data);
			$this->load->view('sidemenu');
			$this->load->view('admin/admin_view');
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


		$vals = array(
		        'word'          => '',
		        'img_path'      => './imagesbook/captcha/',
		        'img_url'       => base_url().'imagesbook/captcha/',
		        'font_path'     => base_url().'/system/fonts/texb.ttf',
		        'img_width'     => '250',
		        'img_height'    => 50,
		        'expiration'    => 7200,
		        'word_length'   => 6,
		        'font_size'     => 28,
		        'img_id'        => 'Imageid',
		        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		        // White background and border, black text and red grid
		        'colors'        => array(
		                'background' => array(135, 206, 250),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(211, 247, 195)
		        )
		);

		$cap = create_captcha($vals);
		$data['cimage'] = $cap['image'];
		$data['cvalues'] = $cap['word'];



		$data['title'] = "| Add New Admin |";
		//$data['data']=$this->AdminModel->admin_list();
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
			$this->session->set_flashdata('message','Successfully submit your data...');
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
			echo "1";
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
			$this->session->set_flashdata('message','Successfully update record...');
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
		$data['user_perm']=$this->AdminModel->user_perm($id);
		$this->load->view('admin/admin_details_model_page',$data);
	}
	public function refresh_captche()
	{

		$vals = array(
		        'word'          => '',
		        'img_path'      => './imagesbook/captcha/',
		        'img_url'       => base_url().'imagesbook/captcha/',
		        'font_path'     => base_url().'/system/fonts/texb.ttf',
		        'img_width'     => '250',
		        'img_height'    => 50,
		        'expiration'    => 7200,
		        'word_length'   => 6,
		        'font_size'     => 28,
		        'img_id'        => 'Imageid',
		        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		        // White background and border, black text and red grid
		        'colors'        => array(
		                'background' => array(135, 206, 250),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(211, 247, 195)
		        )
		);

		$cap = create_captcha($vals);
		$data['cimage'] = $cap['image'];
		$data['cvalues'] = $cap['word'];
 		echo json_encode($data);

	}	
	public function email_exit()
	{
		$email=$_POST['email'];
		$sql = "select * from user_login where Uemail='$email'";
		$query=$this->db->query($sql);
		$query->row();
		$affected_row = $this->db->affected_rows();
		if($affected_row > 0) 
		{
			echo "1";
		}
	}
	public function username_exit()
	{
		$uname=$_POST['uname'];
		$sql = "select * from user_login where Uusername='$uname'";
		$query=$this->db->query($sql);
		$query->row();
		$affected_row = $this->db->affected_rows();
		if($affected_row > 0) 
		{
			echo "1";
		}
	}

	public function loadRecord($pageno='',$limit='')
	{
	  if($pageno=="" && $limit=="")
	  {

		$data['title'] = "| Admin List |";
		$this->load->view('header',$data);
		$this->load->view('sidemenu');
		$this->load->view('admin/admin_view');
		$this->load->view('footer');
	  }
	  else
	  {


		if($limit == -1) {
        	$limit_per_page = 10;
        }
        else{
			$limit_per_page = $limit;
        }

        if($pageno != 0){
          $start = ($pageno-1) * $limit_per_page;
        }
        else
        {
        	$start = 0;
        }

        $total_record = $this->AdminModel->limit_record('','',0);
        $users_record = $this->AdminModel->limit_record($limit_per_page, $start,1);

        //$data['page']=$pageno;



        $this->config->load('pagination',TRUE);
		$settings = $this->config->item('pagination');
		$settings['total_rows'] = $total_record;
		$settings['per_page'] = $limit_per_page;
		$settings['base_url'] = base_url().'AdminController/loadRecord';
		$this->pagination->initialize($settings);		
		
		if($pageno==0){
			$pageno = 1;
		}else{
			$pageno = $pageno;
		}

		$from = (($pageno * $limit_per_page) - $limit_per_page + 1);
        $to = min( ($pageno * $limit_per_page), $total_record );

		$total_page = ceil($total_record/$limit_per_page);
		$data['pagination']=$this->pagination->create_links();
        $data['result'] = $users_record;
        $data['pageno'] = $pageno;

        $data['show_records'] = "Showing ".$from." to ".$to." of ".$total_record." entries";
        $data['page_tpage'] = '<input type="hidden" class="pageno" value="' . $pageno . '" /><input type="hidden" class="totalpage" value="' . $total_page . '" />';
 	    echo json_encode($data);
	  }
	}
}
?>