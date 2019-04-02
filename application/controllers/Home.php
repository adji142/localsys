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
	}
	function Index()
	{
		$this->load->view('Index');
	}
	function ViewAnak()
	{
		$this->load->view('ViewMasterAnak');
	}
}