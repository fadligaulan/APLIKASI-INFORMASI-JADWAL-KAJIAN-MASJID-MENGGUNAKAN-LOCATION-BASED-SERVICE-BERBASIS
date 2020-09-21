<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_video extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_video');
	    $this->load->helper('file');
	    $this->load->database();
	}

	public function index()
	{
	    $video = $this->Model_video->get_data_video()->result(); 
	    $data['video'] = $video;

	    $response = array();
	    $posts = array();
	    foreach ($video as $row) 
	    { 
	        $posts[] = array(
	            "id"         			=>  $row->id_video,
	            "nama_masjid"       	=>  $row->nama_masjid,
	            "alamat_masjid"     	=>  $row->alamat_masjid,
	            "contact_masjid" 		=>  $row->contact_masjid,
	            "judul_video"      	    =>  $row->judul_video,
	            "des_video"  	        =>  $row->des_video,
	            "tgl_video"     		=>  $row->tgl_video,
	            "nama_ustadz"     	  	=>  $row->nama_ustadz,
	            "url_video"     	    =>  base_url().'/assets/video/file/'.$row->url_video
	        );
	    } 
	    $response['video'] = $posts;
	    echo json_encode($response,TRUE);
	}
}