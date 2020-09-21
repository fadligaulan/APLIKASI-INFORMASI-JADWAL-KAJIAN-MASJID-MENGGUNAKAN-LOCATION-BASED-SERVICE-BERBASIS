<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_masjid');
        // $this->load->model('services_model');
        // $this->load->library('form_validation');
         $this->load->helper('notification');
         $this->load->model('Model_peserta');
    }

    public function test($param = '')
    {
        $data = date('Ymdhis');
        // $this->db->insert('test', array('nilai' => $data));
        $longitude = $this->input->post('long');
        $latitude = $this->input->post('lat');
        $token = $this->input->post('token');
        
        $data = array (
                        'lat' => $latitude,
                        'long' => $longitude,
                        'token' => $token
                    );
                    
        send_notif(array($token), 'Kajian Near You', 'Halo ada kajian di sekitarmu', 'KajianSekitarActivity');
        echo json_encode(array('status' => 200, 'data' => $data));
        
        die;
        
        // $dataPeserta = $this->Model_peserta->get_peserta();
        // foreach($dataPeserta as $peserta) {
            
        // }
        
        
    }
    
    public function login($param = ''){
        echo json_encode(array('error' => false, 'user' => array('nama' => 'Muhammad Wahyudi')));die;
    }
}
