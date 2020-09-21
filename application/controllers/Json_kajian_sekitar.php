<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_kajian_sekitar extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_kajian');
	    $this->load->model('Model_devices');
	    $this->load->helper('file');
	    $this->load->helper('distance_helper');
	    $this->load->database();
	}

	public function index()
	{
	    $dataPost = $this->Model_devices->getDeviceByCode($this->input->get('device_code'));
	    
	    $tgl_acuan   = date('Y-m-d');
	    $upcomingKajian = $this->Model_kajian->getKajianByWaktuKajianBesarDari($tgl_acuan);
	   if ($upcomingKajian) {
           $forView = array();
           foreach($upcomingKajian as $kajian) {
               // cek jarak device dengan lokasi kajian
               $distance = distance($kajian->lat, $kajian->lng, $dataPost->last_latitude, $dataPost->last_longitude, 'M'); // by meter
               if ($distance <= 500) {
                   if ((date('Y-m-d H:i:s') <= date('Y-m-d H:i:s',strtotime($kajian->tgl_kajian.' '.$kajian->waktu_kajian)))) {
                       $forView[] = $kajian;
                   }
               } 
           }
            //--------------------------------------------- generateing
            $response = array();
            $posts = array();
            foreach ($forView as $row) 
            { 
                $posts[] = array(
                    "id"         			=>  $row->id_kajian,
                    "nama_masjid"       	=>  $row->nama_masjid,
                    "alamat_masjid"     	=>  $row->alamat_masjid,
                    "contact_masjid" 		=>  $row->contact_masjid,
                    "judul_kajian"      	=>  $row->judul_kajian,
                    "deskripsi_kajian"  	=>  $row->deskripsi_kajian,
                    "tgl_kajian"     		=>  $row->tgl_kajian,
                    "waktu_kajian"     	  	=>  $row->waktu_kajian,
                    "nama_ustadz"     	  	=>  $row->nama_ustadz,
                    "jml_peserta_kajian"  	=>  $row->jml_peserta_kajian,
                    "poster_kajian"     	=>  base_url().'/assets/images/poster/'.$row->poster_kajian
                );
            } 
            $response['kajian'] = $posts;
            echo json_encode($response,TRUE);die;
	       
	   } else {
	       $response['kajian'] = null;
            echo json_encode($response,TRUE);die;
	   }
	}
}