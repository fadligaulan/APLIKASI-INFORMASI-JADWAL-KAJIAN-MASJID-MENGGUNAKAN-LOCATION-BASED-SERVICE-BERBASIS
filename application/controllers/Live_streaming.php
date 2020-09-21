<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live_streaming extends CI_Controller {

	 public function __construct()
    {
         parent::__construct();
         $this->load->model('Model_streaming');
         $this->load->model('Model_takmir');
    }

    public function index()
    {
        $data['pageTitle'] = 'Jadwal Live_streaming';      
        $data['streaming'] = $this->Model_streaming->getByID()->result();
        $data['pageContent'] = $this->load->view('data_live_streaming_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);

    }

    public function insert() 
    {
       if ($this->input->post('submit')) {

            $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;

            $data = array(
                'id_streaming'             => $this->input->post(''),
                'id_masjid'                => $id_masjid,                                              
                'judul_streaming'          => $this->input->post('judul_streaming'),
                'des_streaming'            => $this->input->post('des_streaming'),
                'nama_ustadz'              => $this->input->post('nama_ustadz'),
                'tgl_streaming'            => $this->input->post('tgl_streaming'),
                'url_streaming'            => $this->input->post('url_streaming')               
            );

            $query = $this->Model_streaming->insert($data);

            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data live streaming telah ditambahkan');
            else $message = array('status' => true, 'message' => 'Data live streaming gagal ditambahkan');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('live-streaming', 'refresh');
        }
        $data['pageTitle'] = 'Tambah Live_streaming';      
        $data['streaming'] = $this->Model_streaming->getByID()->result();
        $data['pageContent'] = $this->load->view('tambah_streaming', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            
            $data = array(                                                
                'judul_streaming'          => $this->input->post('judul_streaming'),
                'des_streaming'          => $this->input->post('des_streaming'),
                'nama_ustadz'              => $this->input->post('nama_ustadz'),
                'tgl_streaming'            => $this->input->post('tgl_streaming'),
                'url_streaming'            => $this->input->post('url_streaming')                
            );
        
            // Jalankan function update pada model
            $id = $this->input->post('id');
            $query = $this->Model_streaming->update($id, $data);


             
            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data live streaming telah di perbaharui');
            else $message = array('status' => true, 'message' => 'Data live streaming gagal di perbaharui');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('live-streaming');
        }


        // Ambil data user dari database
        $streaming = $this->Model_streaming->get_streaming_byId($id);

        // print_r($streaming);
        // die;

        // Jika data user tidak ada maka show 404
        if (!$streaming) show_404();;

        $data['pageTitle'] = 'Update Live_streaming';      
        $data['streaming'] = $streaming;
        $data['pageContent'] = $this->load->view('update_streaming', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function delete($id = null)
    {
        $streaming = $this->Model_streaming->get_streaming_byId($id);

        if (!$streaming) show_404();
            
        $query = $this->Model_streaming->delete($id);
    
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Data live streaming telah dihapus');
        else $message = array('status' => true, 'message' => 'Data live streaming gagal dihapus');
    
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        redirect('live-streaming', 'refresh');

    }

}