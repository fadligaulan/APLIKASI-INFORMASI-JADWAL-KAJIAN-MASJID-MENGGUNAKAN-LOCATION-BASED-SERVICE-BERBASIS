<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_masjid extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_masjid');
        $this->load->helper('file');
        $this->load->database();
    }

    public function index()
    {
        $masjid = $this->Model_masjid->get_data_masjid(); 
        $data['masjid'] = $masjid;

        $response = array();
        $posts = array();
        foreach ($masjid as $row) 
        { 
            $posts[] = array(
                "id"                 =>  $row->id_masjid,
                "nama_masjid"        =>  $row->nama_masjid,
                "alamat_masjid"      =>  $row->alamat_masjid,
                "des_masjid"         =>  $row->des_masjid,
                "contact_masjid"     =>  $row->contact_masjid,
                "foto_masjid"        =>  $row->foto_masjid,
                "lat"                =>  $row->lat,
                "lng"                =>  $row->lng,
                "thn_berdiri"        =>  $row->thn_berdiri,
                "foto_masjid"     	 =>  base_url().'assets/foto/masjid/'.$row->foto_masjid
            );
        } 
        $response['masjid'] = $posts;
        echo json_encode($response,TRUE);
    }
}


