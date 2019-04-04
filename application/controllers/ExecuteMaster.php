<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ExecuteMaster extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('GlobalVar');
        $this->load->model('DataModels');
        $this->load->model('ModelsExecuteMaster');
	}
	function SaveUpdateKU()
	{
        $data = array('success' => false ,'message'=>array());
        $KUID = $this->input->post('KelasUsiaID');
        $ID =$this->input->post('id');

        $UpdateData = array(
            'KelasUsiaID' => $KUID
        );
        $UpdateWhere = array(
            'id'=>$ID
        );

        $Exec = $this->ModelsExecuteMaster->ExecUpdate($UpdateData,$UpdateWhere,'masteranak');
        if($Exec){
            $data['success'] = true;
        }
        else{
            $data['message'] = '500-02';
        }
        echo json_encode($data);
	}
}