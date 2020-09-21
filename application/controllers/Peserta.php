<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
    {
         parent::__construct();
         $this->load->model('Model_peserta');
         $this->load->model('Model_takmir');
    }

    public function index()
    {
        $data['pageTitle'] = 'Peserta';      
        // $data['peserta'] = $this->Model_peserta->get_peserta()->result();
        $data['peserta'] = $this->Model_peserta->get_peserta()->result();
        $data['pageContent'] = $this->load->view('data_peserta_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);

    }

    

}