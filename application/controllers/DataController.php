<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class DataController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('GlobalVar');
        $this->load->model('DataModels');
	}
	function GetDataAnak()
	{
        $data = array('success' => false ,'message'=>array(),'data'=>array());
        $id = $this->input->post('id');
        $Recordset = $this->DataModels->FindDataAnak($id);
        if($Recordset->num_rows()>0){
            $data['success'] = true;
            $data['data'] = $Recordset->result();
        }
        else{
            $data['message'] = '404-02'; //data anak kosong
        }
        echo json_encode($data);
	}
}