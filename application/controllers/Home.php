<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalVar');
		$this->load->model('DataModels');
	}
	function Index()
	{
		$this->load->view('Index');
	}
	function ViewAnak()
	{
		$data['have_post'] = null;
		$Recordset = $this->DataModels->GetDataAnak();
		if($Recordset->num_rows()>0){
			$data['have_post'] = $Recordset->result();
		}
		$this->load->view('ViewMasterAnak',$data);
	}
}