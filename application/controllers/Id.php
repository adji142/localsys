<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Id extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function Index()
	{
		// echo "string".$this->encryption->encrypt('admin123');
		$this->load->view('Login');
	}
}