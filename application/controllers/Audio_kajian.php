<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audio_kajian extends CI_Controller {

	 public function __construct()
    {
         parent::__construct();
         $this->load->model('Model_audio');
         $this->load->model('Model_takmir');
    }

    public function index()
    {
        $data['pageTitle'] = 'Audio Kajian';      
        $data['audio'] = $this->Model_audio->getByID()->result();
        $data['pageContent'] = $this->load->view('data_audio_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);

    }

    public function insert() 
    {
       if ($this->input->post('submit')) {
        if (!empty($_FILES['file_audio']['name'])) {
            // Konfigurasi library upload codeigniter
            $configaudio['upload_path'] = './assets/audio/file';
            $configaudio['allowed_types'] = 'mp4|avi|mp3|3gp';
            $configaudio['overwrite'] = FALSE;
            $configaudio['remove_spaces'] = TRUE;
            $configaudio['max_size'] = 602400000;
            $configaudio['file_name'] = 'audio_';
                
            // Load library upload
            $this->load->library('upload', $configaudio);
            $this->upload->initialize($configaudio);
                    
            // Jika terdapat error pada proses upload maka exit
            if (!$this->upload->do_upload('file_audio')) {
                exit($this->upload->display_errors());
            }
            else
            {
                $file = $this->upload->data()['file_name'];
            }                                              
        }
            $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;
            


            $data = array(
                'id_audio'              => $this->input->post(''),
                'id_masjid'             => $id_masjid,                                              
                'judul_audio'           => $this->input->post('judul_audio'),
                'des_audio'             => $this->input->post('des_audio'),
                'nama_ustadz'           => $this->input->post('nama_ustadz'),
                'tgl_audio'             => $this->input->post('tgl_audio'),               
                'file_audio'            => $file                
            );

            $query = $this->Model_audio->insert($data);

            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Audio telah ditambahkan');
            else $message = array('status' => true, 'message' => 'Audio gagal ditambahkan');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('audio-kajian', 'refresh');
        }
        $data['pageTitle'] = 'Tambah Audio Kajian';      
        $data['audio'] = $this->Model_audio->get_audio()->result();
        $data['pageContent'] = $this->load->view('tambah_audio_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            if (!empty($_FILES['file_audio']['name'])) {
                // Konfigurasi library upload codeigniter
                $configaudio['upload_path'] = './assets/audio/file';
                $configaudio['allowed_types'] = 'mp4|avi|mp3|3gp';
                $configaudio['overwrite'] = FALSE;
                $configaudio['remove_spaces'] = TRUE;
                $configaudio['max_size'] = 602400000;
                $configaudio['file_name'] = 'audio_';
            
                // Load library upload
                $this->load->library('upload', $configaudio);
                $this->upload->initialize($configaudio);
                
                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('file_audio')) {
                    exit($this->upload->display_errors());
                }
                else
                {
                    $file = $this->upload->data()['file_name'];
                }                                                        
            }
            else
            {
              $file = $this->input->post('file_lama');  
            }
            
            $data = array(                                                
                'judul_audio'           => $this->input->post('judul_audio'),
                'des_audio'             => $this->input->post('des_audio'),
                'nama_ustadz'           => $this->input->post('nama_ustadz'),
                'tgl_audio'             => $this->input->post('tgl_audio'),               
                'file_audio'            => $file                
            );
        
            // Jalankan function update pada model
            $id = $this->input->post('id');
            $query = $this->Model_audio->update($id, $data);


             
            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data audio telah di perbaharui');
            else $message = array('status' => true, 'message' => 'Data Kajian gagal di perbaharui');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('audio-kajian');
        }


        // Ambil data user dari database
        $audio = $this->Model_audio->get_audio_byId($id);


        // Jika data user tidak ada maka show 404
        if (!$audio) show_404();

        $data['pageTitle'] = 'Update Audio Kajian';      
        $data['audio'] = $audio;
        $data['pageContent'] = $this->load->view('update_audio_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function delete($id = null)
    {
        $audio = $this->Model_audio->get_audio_byId($id);

        if (!$audio) show_404();
            
        $query = $this->Model_audio->delete($id);
    
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Data Audio Kajian telah dihapus');
        else $message = array('status' => true, 'message' => 'Data Audio Kajian gagal dihapus');
    
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        redirect('audio-kajian', 'refresh');

    }

}