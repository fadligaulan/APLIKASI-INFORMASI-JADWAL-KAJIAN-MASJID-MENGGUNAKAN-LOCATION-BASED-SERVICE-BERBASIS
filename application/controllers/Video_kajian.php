<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_kajian extends CI_Controller {

	 public function __construct()
    {
         parent::__construct();
         $this->load->model('Model_video');
         $this->load->model('Model_takmir');
    }

    public function index()
    {
        $data['pageTitle'] = 'Video Kajian';      
        $data['video'] = $this->Model_video->getByID()->result();
        $data['pageContent'] = $this->load->view('data_video_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);

    }

    public function insert() 
    {
       if ($this->input->post('submit')) {
        if (!empty($_FILES['file_video']['name'])) {
            // Konfigurasi library upload codeigniter
            $configvideo['upload_path'] = './assets/video/file';
            $configvideo['allowed_types'] = 'mp4|avi|mp3|3gp|mkv';
            $configvideo['overwrite'] = FALSE;
            $configvideo['remove_spaces'] = TRUE;
            $configvideo['max_size'] = 602400000;
            $configvideo['file_name'] = 'video_';
                
            // Load library upload
            $this->load->library('upload', $configvideo);
            $this->upload->initialize($configvideo);
                    
            // Jika terdapat error pada proses upload maka exit
            if (!$this->upload->do_upload('file_video')) {
                exit($this->upload->display_errors());
            }
            else
            {
                $file = $this->upload->data()['file_name'];
            }                                              
        }

            $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;
            
  

            $data = array(
                'id_video'              => $this->input->post(''),
                'id_masjid'             => $id_masjid,                                              
                'judul_video'           => $this->input->post('judul_video'),
                'des_video'             => $this->input->post('des_video'),
                'nama_ustadz'           => $this->input->post('nama_ustadz'),
                'tgl_video'             => $this->input->post('tgl_video'),               
                'url_video'            => $file                
            );

            $query = $this->Model_video->insert($data);

            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Video telah ditambahkan');
            else $message = array('status' => true, 'message' => 'Video gagal ditambahkan');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('video-kajian', 'refresh');
        }
        $data['pageTitle'] = 'Tambah Video Kajian';      
        $data['video'] = $this->Model_video->get_video()->result();
        $data['pageContent'] = $this->load->view('tambah_video_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            if (!empty($_FILES['file_video']['name'])) {
                // Konfigurasi library upload codeigniter
                $configvideo['upload_path'] = './assets/video/file';
                $configvideo['allowed_types'] = 'mp4|avi|mp3|3gp';
                $configvideo['overwrite'] = FALSE;
                $configvideo['remove_spaces'] = TRUE;
                $configvideo['max_size'] = 602400000;
                $configvideo['file_name'] = '';
            
                // Load library upload
                $this->load->library('upload', $configvideo);
                $this->upload->initialize($configvideo);
                
                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('file_video')) {
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
                'judul_video'           => $this->input->post('judul_video'),
                'des_video'             => $this->input->post('des_video'),
                'nama_ustadz'           => $this->input->post('nama_ustadz'),
                'tgl_video'             => $this->input->post('tgl_video'),               
                'url_video'            => $file                
            );
        
            // Jalankan function update pada model
            $id = $this->input->post('id');
            $query = $this->Model_video->update($id, $data);


             
            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data video telah di perbaharui');
            else $message = array('status' => true, 'message' => 'Data Kajian gagal di perbaharui');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('video-kajian');
        }


        // Ambil data user dari database
        $video = $this->Model_video->get_video_byId($id);


        // Jika data user tidak ada maka show 404
        if (!$video) show_404();

        $data['pageTitle'] = 'Update Video Kajian';      
        $data['video'] = $video;
        $data['pageContent'] = $this->load->view('update_video_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function delete($id = null)
    {
        $video = $this->Model_video->get_video_byId($id);

        if (!$video) show_404();
            
        $query = $this->Model_video->delete($id);
    
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Kajian telah dihapus');
        else $message = array('status' => true, 'message' => 'Kajian gagal dihapus');
    
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        redirect('video-kajian', 'refresh');

    }

}