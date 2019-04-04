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
        
        $Recordset = $this->DataModels->GetDataAnak();
        if($Recordset->num_rows()>0){
            $params = $_REQUEST;
            $totalRecords = $Recordset->num_rows();
            
            $data['success'] = true;
            $data['data'] =array(
                "draw" => 0 ,
                "recordsTotal" => intval($totalRecords),
                "recordsFiltered" => intval($recordsFiltered),
                "data" => $Recordset->result()
            );
        }
        echo json_encode($data);
	}
}