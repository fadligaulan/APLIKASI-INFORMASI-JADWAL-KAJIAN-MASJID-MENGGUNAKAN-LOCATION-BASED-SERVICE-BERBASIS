<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_detail_kajian extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_kajian');
	    $this->load->helper('file');
	    $this->load->database();
	}

	public function index()
	{
	    $id = $this->input->get('id_kajian');
	    $kajian = $this->Model_kajian->get_data_kajian_by_id($id); 

	    $response = array();
	    $posts = array();
	    foreach ($kajian as $row) 
	    { 
	        $posts[] = array(
	            "id"         			=>  $row->id_kajian,
	            "nama_masjid"       	=>  $row->nama_masjid,
	            "alamat_masjid"     	=>  $row->alamat_masjid,
	            "contact_masjid" 		=>  $row->contact_masjid,
	            "judul_kajian"      	=>  $row->judul_kajian,
	            "deskripsi_kajian"  	=>  $row->deskripsi_kajian,
	            "tgl_kajian"     		=>  date('m/d/Y', strtotime($row->tgl_kajian)),
	            "waktu_kajian"     	  	=>  date('h:i A', strtotime($row->tgl_kajian.' '.$row->waktu_kajian)),
	            "nama_ustadz"     	  	=>  $row->nama_ustadz,
	            "jml_peserta_kajian"  	=>  $row->jml_peserta_kajian ? $row->jml_peserta_kajian : "",
	            "poster_kajian"     	=>  base_url().'assets/images/poster/'.$row->poster_kajian
	        );
	    } 
	    $response['detail_kajian'] = $posts;
	    echo json_encode($response,TRUE);
	}
}

