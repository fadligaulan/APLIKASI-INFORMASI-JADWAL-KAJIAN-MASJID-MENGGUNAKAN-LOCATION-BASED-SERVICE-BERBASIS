<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_takmir extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_takmir');
        $this->load->helper('file');
        $this->load->database();
    }

    public function index()
    {
        $takmir = $this->Model_takmir->get_data_takmir(); 
        $data['takmir'] = $takmir;

        $response = array();
        $posts = array();
        foreach ($takmir as $row) 
        { 
            $posts[] = array(
                "id_takmir"          =>  $row->id_takmir,
                "id_masjid"          =>  $row->id_masjid,
                "nama_takmir"        =>  $row->nama_takmir,
                "no_hp"              =>  $row->no_hp,
                "alamat"             =>  $row->alamat,
                "username"           =>  $row->username,
                "pwd"                =>  $row->pwd,
                "foto_takmir"        =>  $row->foto_takmir,
                
            );
        } 
        $response['posts'] = $posts;
        echo json_encode($response,TRUE);
    }
}
