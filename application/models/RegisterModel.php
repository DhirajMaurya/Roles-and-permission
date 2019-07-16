<?php
class RegisterModel extends CI_Model
{
	public function check_data()
	{
		return $this->db->get('user_login')->result();
	}
	public function register()
	{
		extract($_POST);
		$config['upload_path']          = './imagesbook/admin_photo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']			= TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('aphoto'))
        {
                $error = array('error' => $this->upload->display_errors());

               // $this->load->view('upload_form', $error);
        }
        else
        {
                $data = $this->upload->data();
                $image = $data['file_name'];
                //$this->load->view('upload_success', $data);
        }

        $insert = array(
                        "Uname"=>$aname,
        				"Uusername"=>$uname,
        				"Uphoto"=>$image,
        				"Uemail"=>$aemail,
        				"Umobile"=>$amobile,
        				"Upassword"=>md5($apass),
                        "Roleid"=>1,
                        "Uregisterdate"=>date('Y-m-d H:i:s'),
                        "Ustatus"=>1
        				);
        $this->db->insert("user_login",$insert);
/*        $id=$this->db->insert_id();

        $per = array(
                    "Uid"=>$id,
                    "Pview"=>1,
                    "Pinsert"=>1,
                    "Pupdate"=>1,
                    "Pdelete"=>1
                    );
        $this->db->insert("permission",$per);*/

	}
}
?>