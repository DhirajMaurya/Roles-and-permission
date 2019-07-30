<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EmployeeController extends CI_Controller
{
	var $perm = array();
	function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model("EmployeeModel");
		$this->load->model('CommanModel');
		$this->perm = $this->CommanModel->permission();
	}
	public function index()
	{
		$this->emp_view();
	}
	public function emp_view()
	{
	  if (in_array("emp_view", $this->perm))
  	  {
		$data = array();
		if (isset($_GET['show_records'])) 
		{
			if($_GET['show_records']=="-1")
			{
				$limit_per_page = 10;
				$data['all_record'] = 10;
			}
			else
			{
				$limit_per_page = $_GET['show_records'];
			}
		}
		else
		{
			$limit_per_page = 10;
		}
        $start_index = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;

        $total_records = $this->EmployeeModel->get_current_page_records($limit_per_page,$start_index*$limit_per_page,-1);
        $data['show_total_records'] = $total_records;
		if ($total_records > 0) 
		{
			$data['emp_data']=$this->EmployeeModel->get_current_page_records($limit_per_page,$start_index*$limit_per_page,0);
			$this->config->load('pagination',TRUE);
			$settings = $this->config->item('pagination');
			$settings['total_rows'] = $total_records;
			$settings['per_page'] = $limit_per_page;
			$settings['base_url'] = base_url().'EmployeeController/emp_view';
			
			$this->pagination->initialize($settings);		
			$data['links']=$this->pagination->create_links();
		}
		
		$data['title'] = "| Employee | Employee List";
		$this->load->view("header",$data);
		$this->load->view("sidemenu");
		$this->load->view("employee/emp_view",$data);
		$this->load->view("footer");

	  }
	  else
	  {
	  	$this->session->set_flashdata('emessage','Permission not allow.');
		redirect('Dashboard');
	  }
	}
	public function emp_add()
	{
		$data['title'] = "| Employee | Add New Employee";
		$this->load->view("header",$data);
		$this->load->view("sidemenu");
		$this->load->view("employee/emp_add");
		$this->load->view("footer");
	}
	public function emp_insert()
	{
	  if (in_array("emp_insert", $this->perm))
  	  {		
		// create new PDF document
	    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
	  
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('D & K Technologies');
		$pdf->SetTitle('Job Offer Letter');
		$pdf->SetSubject('Offer Letter');
		// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 13);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$html = '
		<hr>
		<h3 style="text-align:center;">Offer Letter</h3>
		<font style="text-align:right;">Date : '.date('d-m-Y').'</font>
		<p>
		Wibrate Comunication LLP<br>
		305,Sunshine Complex,<br>
		Opp. CNG Pump, Nr. Sudama Chowk,<br>
		Mota Varachha, Surat-394101<br><br><br>
		Dear '.$this->input->post('ename').',<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We are pleased to offer placement with concern part of D & K Group of Companies named
		"Wibrate Comunication LLP" for the post of "'.$this->input->post('epost').'" beginning on '.$this->input->post('edoj').' Tranning
		period is 3 months, on the basis of your performance in tranning you are pramotted for perment
		employment.<br><br>
		You are expected to be here by 9:30 am on the joining date.<br>
		We are happy having you in our team.<br><br>
		Sincerely,<br><br><br><br>
		Arth Patel<br>
		HR Associate
		</p>
		';
		// print a block of text using Write()
		$pdf->writeHTML($html, true, false, true, false,'');

		// ---------------------------------------------------------

		$filename = $this->input->post('ename').'_'.date('d_m_Y').'.pdf';
		//Close and output PDF document
		//$pdf->Output($filename.'.pdf', 'I');

		$filelocation = "C:\\xampp\\htdocs\\dhiraj\\joiningletter";
		$fileNL = $filelocation."\\".$filename;
		$pdf->Output($fileNL, 'F');
		//============================================================+
		// END OF FILE
		//============================================================+
		$this->EmployeeModel->emp_insert($filename);
		$this->session->set_flashdata('message','Successfully submit your data...');
		redirect("EmployeeController/emp_view");   
      }
	  else
	  {
	  	$this->session->set_flashdata('emessage','Permission not allow.');
		redirect('EmployeeController/emp_view');
	  }
    }
	public function emp_delete($id)
	{
		if(in_array("emp_delete", $this->perm))
  	  	{
			$this->EmployeeModel->emp_delete($id);
			$this->session->set_flashdata('message','Successfully delete record...');
		}
		else
		{
			$this->session->set_flashdata('emessage','Permission not allow.');
		}
	}
	public function emp_status($id)
	{
		$data=$this->EmployeeModel->emp_status($id);
		if($data->Estatus==1)
		{
			$response='<button title="Active" class="btn btn-success btn-sm" onclick="status('.$data->Eid.')"><span class="glyphicon glyphicon-ok-circle" style="font-size: 20px"></span></button>';
		}
		else
		{
			$response='<button title="Deactive" class="btn btn-danger btn-sm" onclick="status('.$data->Eid.')"><span class="glyphicon glyphicon-remove-circle" style="font-size: 20px"></span></button>';
		}
		echo $response;
	}
	public function emp_edit($id)
	{
		$data['edit_data']=$this->EmployeeModel->emp_edit($id);
		$data['title'] = "| Employee | Update Employee";
		$this->load->view("header",$data);
		$this->load->view("sidemenu");
		$this->load->view("employee/emp_edit",$data);
		$this->load->view("footer");
	}
	public function emp_update($id)
	{
		if(in_array("emp_update", $this->perm))
  	  	{
			$this->EmployeeModel->emp_update($id);
			$this->session->set_flashdata('message','Successfully update record...');
			redirect("EmployeeController/emp_view");
		}
		else
		{
			$this->session->set_flashdata('emessage','Permission not allow.');
			redirect('EmployeeController/emp_view');
		}
	}
	public function emp_details($id)
	{
		$data['emp_details'] = $this->EmployeeModel->emp_details($id);
		$this->load->view('employee/emp_details_model_ajax',$data);
	}
	public function scrolling_data_get()
	{
		sleep(1);
		$perPage = 10;
		if(!empty($_GET["page"])) 
		{
			$page = $_GET["page"];
		}
		$start = ($page-1)*$perPage;
		$data['emp_data']=$this->EmployeeModel->get_current_page_records($perPage,$start,0);
		$total_records = $this->EmployeeModel->get_current_page_records($perPage,$start,-1);
		if(empty($_GET["rowcount"])) 
		{
			$rowcount = ceil($total_records / $perPage);
		}
		if (!empty($data['emp_data'])) 
		{
			$data['start'] = $start+1;
			$data['fields'] = '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="rowcount" value="' . $rowcount . '" />';
			$this->load->view('employee/scrolling_data',$data);
		}
	}
	function emp_attendance()
	{
		$data['title'] = "| Employee Attendance |";
		$this->load->view("header",$data);
		$this->load->view("sidemenu");
		$this->load->view("employee/emp_attendance");
		$this->load->view("footer");
	}

	public function export()
	{
		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();
        $all_records = $this->EmployeeModel->export();
        // manually set table data value
        $sheet->setCellValue('A1', 'Employee Id'); 
        $sheet->setCellValue('B1', 'Employee Name');
        $sheet->setCellValue('C1', 'Employee Gender');
        $sheet->setCellValue('D1', 'Employee DOB');
        $sheet->setCellValue('E1', 'Employee Designation');
        $sheet->setCellValue('F1', 'Employee Post');
        $sheet->setCellValue('G1', 'Employee Hobbies');
        $sheet->setCellValue('H1', 'Employee EmailId');
        $sheet->setCellValue('I1', 'Employee Mobile');
        $sheet->setCellValue('J1', 'Employee Address');
        $sheet->setCellValue('K1', 'Employee Qualification');
        $sheet->setCellValue('L1', 'Employee Experience (Year)');
        $sheet->setCellValue('M1', 'Employee Join Date');
        $sheet->setCellValue('N1', 'Employee Status');
        
        $count_row=2;
        foreach ($all_records as $record) {
	        $sheet->setCellValue('A'.$count_row, $record->Eid); 
	        $sheet->setCellValue('B'.$count_row, $record->Ename);
	        if($record->Egender==1){
	        	$gender = 'Male';
	        }else if($record->Egender==2){
	        	$gender = 'Female';
	        }else if($record->Egender==3){
	        	$gender = 'Other';
	        }
	        $sheet->setCellValue('C'.$count_row, $gender);
	        $sheet->setCellValue('D'.$count_row, $record->Edob);
	        $sheet->setCellValue('E'.$count_row, $record->Edesignation);
	        $sheet->setCellValue('F'.$count_row, $record->Epost);
	        $sheet->setCellValue('G'.$count_row, $record->Ehobby);
	        $sheet->setCellValue('H'.$count_row, $record->Eemail);
	        $sheet->setCellValue('I'.$count_row, $record->Emobile);
	        $sheet->setCellValue('J'.$count_row, $record->Eaddress);
	        $sheet->setCellValue('K'.$count_row, $record->Equalification);
	        $sheet->setCellValue('L'.$count_row, $record->Eexperience);
	        $sheet->setCellValue('M'.$count_row, $record->Ejoindate);
	        if($record->Estatus==1){
	        	$status='Active';
	        }else{
	        	$status='Deactive';
	        }
	        $sheet->setCellValue('N'.$count_row, $status);
	        $count_row++;	
        }
        $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
        $spreadsheet->getActiveSheet()->setAutoFilter('A1:N1');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'employee_list_'.date('d_m_Y'); // set filename for excel file to be exported
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');	// download file
	}
	

	function import()
	{
		$data = array();
		if(!empty($_FILES['fileURL']['name'])) 
		{ 
        	// get file extension
        	$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
        	if($extension == 'csv'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
			// $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			// array Count
			/*$arrayCount = count($allDataInSheet);
            $flag = 0;*/

			$worksheet = $spreadsheet->getActiveSheet();
			$highestRow = $worksheet->getHighestRow(); // e.g. 10
			//$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
			//$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

			for ($row = 2; $row <= $highestRow; ++$row) 
			{
			       $id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			       $name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			       $gender = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			       $dob = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
			       $des = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
			       $post = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
			       $hobby = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
			       $email = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
			       $mobile = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
			       $address = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
			       $qual = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
			       $ex = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
			       $jdate = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
			       $status = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
			       if($gender=='Male'){
			       		$gen=1;
			       }elseif ($gender=='Female') {
			       		$gen=2;
			       }elseif ($gender=='Other') {
			       		$gen=3;
			       }

			       if($status=='Active'){
			       		$st=1;
			       }elseif($status=='Deactive'){
			       		$st=0;
			       }
			       $edata=$this->db->get_where('employee',['Emobile' => $mobile])->row();
				   if(empty($edata)){
			       			$data[]=array(
			       					"Ename"=>$name,
			       					"Egender"=>$gen,
			       					"Edob"=>$dob,
			       					"Edesignation"=>$des,
			       					"Epost"=>$post,
			       					"Ehobby"=>$hobby,
			       					"Eemail"=>$email,
			       					"Epassword"=>md5(''),
			       					"Emobile"=>$mobile,
			       					"Eaddress"=>$address,
			       					"Equalification"=>$qual,
			       					"Eexperience"=>$ex,
			       					"Ejoindate"=>$jdate,
			       					"Edateregister"=>date('Y-m-d H:i:s'),
			       					"Estatus"=>$st
			       					);
			       	}
			}

		}

		$return_data=$this->EmployeeModel->import($data);
		if ($return_data==0) 
		{
			$this->session->set_flashdata('emessage','Dublicate record not allow...');
		}else{
			$this->session->set_flashdata('message','Successfully imports all record...');
		}
		redirect('EmployeeController');
	}
}

?>