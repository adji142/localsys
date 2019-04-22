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
        $ID =$this->input->post('idnaik');

        $UpdateData = array(
            'KelasUsiaID' => $KUID
        );
        $UpdateWhere = array(
            'id' => $ID
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

    function SaveUpdateKet()
    {
        $data = array('success' => false ,'message'=>array());
        $stat = 0;
        if ($this->input->post('checked')!= null) $stat = $this->input->post('checked');
        // if ($this->input->post('checked')!= null)
        $ket = $this->input->post('ket');
        $ID =$this->input->post('id');

        $UpdateData = array(
            'status' => $stat,
            'StatusRemark' =>$ket
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
    function GetanakFilterbySG()
    {
        $data = array('success' => false ,'message'=>array(),'data'=>array());
        $id = $this->input->post('nosg');
        $Recordset = $this->DataModels->GetDataAnakFilterbySG($id);
        if($Recordset->num_rows()>0){
            $data['success'] = true;
            $data['data'] = $Recordset->result();
        }
        else{
            $data['message'] = '404-02'; //data anak kosong
        }
        echo json_encode($data);
    }
    function GetSposor()
    {
        $data = array('success' => false ,'message'=>array(),'data'=>array());
        $id = $this->input->post('kd_sponsor');
        $Recordset = $this->DataModels->GetDataSponsor($id);
        if($Recordset->num_rows()>0){
            $data['success'] = true;
            $data['data'] = $Recordset->result();
        }
        else{
            $data['message'] = '404-02'; //data anak kosong
        }
        echo json_encode($data);
    }
    function GetMentor()
    {
        $data = array('success' => false ,'message'=>array(),'data'=>array());
        $id = $this->input->post('namaMentor');
        $Recordset = $this->DataModels->GetDataMentor($id);
        if($Recordset->num_rows()>0){
            $data['success'] = true;
            $data['data'] = $Recordset->result();
        }
        else{
            $data['message'] = '404-02'; //data anak kosong
        }
        echo json_encode($data);
    }
    function GetOrtu()
    {
        $data = array('success' => false ,'message'=>array(),'data'=>array());
        $id = $this->input->post('NamaAyah');
        $Recordset = $this->DataModels->GetDataOrtu($id);
        if($Recordset->num_rows()>0){
            $data['success'] = true;
            $data['data'] = $Recordset->result();
        }
        else{
            $data['message'] = '404-02'; //data anak kosong
        }
        echo json_encode($data);
    }

    function Savedataanak_Add()
    {
        $data = array('success' => false ,'message'=>array());


        $recordownerid = $this->input->post('RecordOnerid');
        $nosg = $this->input->post('nosg');
        $namaanak = $this->input->post('namaanak');
        $Tempatlahir = $this->input->post('TempatLahir');
        $Tanggallahir = $this->input->post('TanggalLahir');
        $Email = $this->input->post('email');
        $tlp = $this->input->post('tlp');
        $alamat_anak = $this->input->post('alamat_anak');
        $id_sponsor = $this->input->post('idsponsor');
        $id_mentor = $this->input->post('idmentor');
        $id_ortu = $this->input->post('idortu');
        $ku = $this->input->post('idku');
        $ppa = $this->GlobalVar->GetMasterPPA($recordownerid);
        $nosg = $ppa->row()->IOPPA . '-'. $nosg;
        
        $data_add = array(
            'NoSG'          => $nosg,
            'namaanak'      => $namaanak,
            'Tempatlahir'   => $Tempatlahir,
            'Tanggallahir'  => $Tanggallahir,
            'Email'         => $Email,
            'NoTlp'         => $tlp,
            'Alamat'        => $alamat_anak,
            'status'        => 1,
            'RecordOwnerID' => $recordownerid,
            'sponsorid'     => $id_sponsor,
            'KeluargaID'    => $id_ortu,
            'KelasUsiaID'   => $ku,
            
        );

        $resultset = $this->ModelsExecuteMaster->ExecInser($data_add,'masteranak');
        if($resultset){
            $data['success'] = true;
        }
        else{
            $data['message'] = 'E500-02-Add';
        }
        echo json_encode($data);
    }
    function Savedataanak_Update()
    {
        $data = array('success' => false ,'message'=>array());

        $recordownerid = $ths->input->post('RecordOnerid');
        $nosg = $this->input->post('nosg_a');
        $namaanak = $this->input->post('namaanak_a');
        $Tempatlahir = $this->input->post('TempatLahir_a');
        $Tanggallahir = $this->input->post('TanggalLahir_a');
        $Email = $this->input->post('email_a');
        $tlp = $this->input->post('tlp_a');
        $alamat_anak = $this->input->post('alamat_anak');

        $data_update = array(
            'namaanak'      => $namaanak,
            'Tempatlahir'   => $Tempatlahir,
            'Tanggallahir'  => $Tanggallahir,
            'Email'         => $Email,
            'NoTlp'         => $tlp,
            'Alamat'        => $alamat_anak,
        );
        $data_where = array(
            'NoSG'          => $nosg,
            'RecordOwnerID' => $recordownerid
        );

        $resultset = $this->ModelsExecuteMaster->ExecUpdate($data_update,$data_where,'masteranak');

        if($resultset){
            $data['success'] = true;
        }
        else{
            $data['message'] = 'E500-02-Update';
        }
        echo json_encode($data);
    }
    // Mentor
    function Savedatamentor_Add()
    {
        $data = array('success' => false ,'message'=>array());


        $recordownerid = $this->input->post('RecordOnerid');
        $idmentor = $this->input->post('idmentor');
        $nmMentor = $this->input->post('nmMentor');
        $KelasUsiaID = $this->input->post('KelasUsiaID');
        $emailMentor = $this->input->post('emailMentor');
        $tlpMentor = $this->input->post('tlpMentor');
        
        $data_add = array(
            'NamaMentor' => $nmMentor,
            'KelasUsiaID' => $KelasUsiaID,
            'Email' => $emailMentor,
            'NoTlp' => $tlpMentor,
            'Alamat' => '',
            'RecordOwnerid' => $recordownerid,          
        );

        $resultset = $this->ModelsExecuteMaster->ExecInser($data_add,'mastermentor');
        if($resultset){
            $data['success'] = true;
        }
        else{
            $data['message'] = 'E500-02-Add';
        }
        echo json_encode($data);
    }
}