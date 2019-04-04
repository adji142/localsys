<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class DataModels extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function GetDataAnak()
	{
        $data = "Select a.id,a.NoSG,a.NamaAnak,a.TanggalLahir,a.NoTlp,b.KelasUsia,c.kodesponsor,
                c.NamaSponsor,c.AsalSponsor from masteranak a
                left join akseskelasusia b on a.KelasUsiaID = b.id
                left join mastersponsor c on c.id = a.sponsorid
                ";
		return $this->db->query($data);
	}
}