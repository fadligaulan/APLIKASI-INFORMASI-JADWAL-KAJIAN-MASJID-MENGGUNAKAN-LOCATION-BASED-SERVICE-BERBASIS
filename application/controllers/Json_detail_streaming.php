<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_detail_streaming extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_streaming');
	    $this->load->helper('file');
	    $this->load->database();
	}

	public function index()
	{
	    $id = $this->input->get('id_streaming');
	    $streaming = $this->Model_streaming->get_data_streaming_by_id($id); 
	    $data['streaming'] = $streaming;

	    $response = array();
	    $posts = array();
	    foreach ($streaming as $row) 
	    { 
	        $posts[] = array(
	            "id"         			=>  $row->id_streaming,
	            "nama_masjid"       	=>  $row->nama_masjid,
	            "alamat_masjid"     	=>  $row->alamat_masjid,
	            "contact_masjid" 		=>  $row->contact_masjid,
	            "judul_streaming"      	=>  $row->judul_streaming,
	            "des_streaming"  	    =>  $row->des_streaming,
	            "tgl_streaming"    		=>  $row->tgl_streaming,
	            "nama_ustadz"     	  	=>  $row->nama_ustadz,
	            "url_streaming"     	=>  $row->url_streaming
	        );
	    } 
	    $response['streaming'] = $posts;
	    echo json_encode($response,TRUE);
	}
}