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
	function FindDataAnak($idanak){
		$data = "Select a.id,a.NoSG,a.NamaAnak,a.TempatLahir,a.TanggalLahir,a.email,a.NoTlp,
                c.NamaSponsor,c.AsalSponsor,c.StartSponsoring,b.KelasUsia,d.namaMentor,d.noTlp notlpmentor,
                e.NamaAyah,e.NoTlpAyah,e.PendidikanAyah,e.PekerjaanAyah,
                e.NamaIbu,e.NoTlpIbu,e.PendidikanIbu,e.PekerjaanIbu from masteranak a
                left join akseskelasusia b on a.KelasUsiaID = b.id
                left join mastersponsor c on c.id = a.sponsorid
                left join mastermentor d on d.KelasUsiaID = a.KelasUsiaID
                left join masterorangtua e on e.id = a.KeluargaID
                ";
		return $this->db->query($data);
	}
	function GetDataKelasUsia()
	{
		return $this->db->get('akseskelasusia');
	}
}