<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->cekLogin();        
        $this->load->model('Model_dashboard');
        $this->load->model('Model_takmir');
         $this->load->model('Model_masjid');

    }
    
    public function cekLogin()
    {
        if (!$this->session->userdata('username')) {
        redirect('auth/login');
        }
    }

    public function index()
    {
        $data['pageTitle'] = 'Dashboard';      
        $data['kajian_byid'] = $this->Model_dashboard->count_KajianById();
        $data['audio_byid'] = $this->Model_dashboard->count_AudioById();
        $data['video_byid'] = $this->Model_dashboard->count_VideoById();
        $data['streaming_byid'] = $this->Model_dashboard->count_StreamingById();
        $data['masjid'] = $this->Model_masjid->getByID()->result();
        $data['pageContent'] = $this->load->view('dashboard', $data, TRUE);

        $chart['kajian'] = $this->Model_dashboard->getKajian();
        $chart['audio'] = $this->Model_dashboard->getAudio();
        $chart['video'] = $this->Model_dashboard->getVideo();
        $chart['streaming'] = $this->Model_dashboard->getStreaming();

        $data['donutChart'] = $chart;

        $this->load->view('template/layout', $data);
        
    }


    public function kajian()
    {
        $data['pageTitle'] = 'Kajian';      
        // $data['kajian'] = $this->Model_kajian->get_kajian()->result();
        $data['kajian'] = $this->Model_kajian->getByID()->result();
        $data['pageContent'] = $this->load->view('data_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function audio()
    {
        $data['pageTitle'] = 'Audio Kajian';      
        $data['audio'] = $this->Model_audio->getByID()->result();
        $data['pageContent'] = $this->load->view('data_audio_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);

    }


    public function video()
    {

        $data['pageTitle'] = 'Video Kajian';      
        $data['video'] = $this->Model_video->getByID()->result();
        $data['pageContent'] = $this->load->view('data_video_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }


    public function streaming()
    {
        $data['pageTitle'] = 'Jadwal Live_streaming';      
        $data['streaming'] = $this->Model_streaming->getByID()->result();
        $data['pageContent'] = $this->load->view('data_live_streaming_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);

    }

    // this function receive ajax request and return closest providers
    function closest_locations(){

        $location =json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $ServiceId=$location->ServiceId;
        $base = base_url();
        $providers= $this->services_model->get_closest_locations($lan,$lat,$ServiceId);
        $indexed_providers = array_map('array_values', $providers);
        // this loop will change retrieved results to add links in the info window for the provider
        $x = 0;
        foreach($indexed_providers as $arrays => &$array){
            foreach($array as $key => &$value){
                if($key === 1){
                    $pieces = explode(",", $value);
                    $value = "$pieces[1]<a href='$base$pieces[0]'>More..</a>";
                }

                $x++;
            }
        }
        echo json_encode($indexed_providers,JSON_UNESCAPED_UNICODE);

    }

    
    
}