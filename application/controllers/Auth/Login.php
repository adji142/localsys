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
}