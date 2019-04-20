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
	// select
	function GetDataAnak()
	{
        $data = "Select a.id,a.NoSG,a.NamaAnak,a.TanggalLahir,a.NoTlp,b.KelasUsia,c.kodesponsor,
                c.NamaSponsor,c.AsalSponsor from masteranak a
                left join akseskelasusia b on a.KelasUsiaID = b.id
                left join mastersponsor c on c.id = a.sponsorid
                ";
		return $this->db->query($data);
	}
	function ShowAnak($KelasUsia)
	{
        $data = "Select a.id,a.NoSG,a.NamaAnak,a.TanggalLahir,a.NoTlp,b.KelasUsia,c.kodesponsor,
                c.NamaSponsor,c.AsalSponsor from masteranak a
                left join akseskelasusia b on a.KelasUsiaID = b.id
                left join mastersponsor c on c.id = a.sponsorid
                where b.id = $KelasUsia
                ";
		return $this->db->query($data);
	}
	function ShowMentor()
	{
        $data = "select a.*,b.KelasUsia from mastermentor a
        		inner join akseskelasusia b on a.KelasUsiaID = b.id
                ";
		return $this->db->query($data);
	}
	function FindDataMentor($idmentor)
	{
        $data = "select a.*,b.KelasUsia from mastermentor a
        		inner join akseskelasusia b on a.KelasUsiaID = b.id
        		where a.id = $idmentor
                ";
		return $this->db->query($data);
	}

	function FindDataAnak($idanak){
		$data = "Select a.id,a.NoSG,a.NamaAnak,a.TempatLahir,a.TanggalLahir,a.email,a.NoTlp,
                c.NamaSponsor,c.AsalSponsor,c.StartSponsoring,b.KelasUsia,d.namaMentor,d.noTlp notlpmentor,
                e.NamaAyah,e.NoTlpAyah,e.PendidikanAyah,e.PekerjaanAyah,
                e.NamaIbu,e.NoTlpIbu,e.PendidikanIbu,e.PekerjaanIbu,a.Status from masteranak a
                left join akseskelasusia b on a.KelasUsiaID = b.id
                left join mastersponsor c on c.id = a.sponsorid
                left join mastermentor d on d.KelasUsiaID = a.KelasUsiaID
                left join masterorangtua e on e.id = a.KeluargaID
                where a.id = $idanak
                ";
		return $this->db->query($data);
	}
	function GetDataKelasUsia()
	{
		return $this->db->get('akseskelasusia');
	}
	function GetKeteranganStatus()
	{
		return $this->db->get('keteranganstatus');
	}
	function GetDataAnakFilterbySG($value)
	{
		$this->db->where('NoSG',$value);
		return $this->db->get('masteranak');
	}
	function GetDataSponsor($value)
	{
		$this->db->where('kodesponsor',$value);
		return $this->db->get('mastersponsor');
	}
	function GetDataMentor($value)
	{
		$this->db->where('namaMentor',$value);
		return $this->db->get('mastermentor');
	}
	function GetDataOrtu($value)
	{
		$this->db->where('namaAyah',$value);
		return $this->db->get('masterorangtua');
	}
}