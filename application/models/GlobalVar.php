<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class GlobalVar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function GetAccessKU($userid)
	{
		$data = "select a.* from kelasusiauser a inner join akseskelasusia b on b.id = a.aksesid where a.userid = $userid";
		return $this->db->query($data);
	}
}