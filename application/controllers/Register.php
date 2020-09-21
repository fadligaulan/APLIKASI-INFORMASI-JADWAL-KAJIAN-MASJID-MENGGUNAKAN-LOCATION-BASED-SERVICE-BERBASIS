<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_masjid');
        // $this->load->model('services_model');
        // $this->load->library('form_validation');
         $this->load->helper('notification');
         $this->load->model('Model_peserta');
    }

    public function register($param = '')
    {
        
     $this->db->insert('peserta', array('token' => $data));
        
        
    }
    

}
