<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth/Login','Autentification');
	}
	function Index()
	{
		# code...
	}
	function Validate()
	{
		$data = array('success' => false ,'message'=>array(),'saving' => false,'error'=>array());
		$this->form_validation->set_rules('user','user','required|trim');
		$this->form_validation->set_rules('password','password','required|trim');

		if($this->form_validation->run()){
			$data['success']=true;
		}
		else{
			foreach ($_POST as $key => $value) {
                $data['message'][$key]=form_error($key);
            }
		}
		echo json_encode($data);
	}
	function Auth_Login()
	{
		$data = array('success' => false ,'message'=>array());
        $usr = $this->input->post('user');
		$pwd =$this->input->post('password');
		
		$Validate_username = $this->Autentification->Validate_username($usr);

		if($Validate_username->num_rows()>0){
			$userid = $Validate_username->row()->id;
			$pass_valid = $this->encryption->decrypt($Validate_username->row()->password);
			
			$get_Validation = $this->Autentification->Validate_Login($userid,$pwd);
			if($get_Validation->num_rows()>0){
				$sess_data['userid']=$userid;
				$data['success'] = true;
			}
			else{
				$data['success'] = false;
				$data['message'] = 'L-01'; // User password doesn't match
			}
		}
		else{
			$data['message'] = 'L-02'; // Username not found
		}
		echo json_encode($data);
	}
}