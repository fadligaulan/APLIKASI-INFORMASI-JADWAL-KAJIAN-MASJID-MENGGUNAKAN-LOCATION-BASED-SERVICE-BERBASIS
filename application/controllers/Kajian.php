<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kajian extends CI_Controller {

	public function __construct()
    {
         parent::__construct();
         $this->load->model('Model_kajian');
         $this->load->model('Model_takmir');
         $this->load->model('Model_devices');
        //  $this->load->model('Model_peserta');
         $this->load->helper('notification');
    }

    public function index()
    {
        $data['pageTitle'] = 'Kajian';      
        // $data['kajian'] = $this->Model_kajian->get_kajian()->result();
        $data['kajian'] = $this->Model_kajian->getByID()->result();
        $data['pageContent'] = $this->load->view('data_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function insert() 
    {
       if ($this->input->post('submit')) {
        if (!empty($_FILES['poster_kajian']['name'])) {
            // Konfigurasi library upload codeigniter
            $kajian['upload_path'] = './assets/images/poster';
            $kajian['allowed_types'] = 'gif|jpg|jpeg|png';
            $kajian['max_size'] = 2000;
            $kajian['width']= 600;
            $kajian['height']= 400;
            $kajian['file_name'] = 'kajian_';
                
            // Load library upload
            $this->load->library('upload', $kajian);
                    
            // Jika terdapat error pada proses upload maka exit
            if (!$this->upload->do_upload('poster_kajian')) {
                exit($this->upload->display_errors());
            }
            else
            {
                $poster = $this->upload->data()['file_name'];
            }                                              
        }
            
            $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;
            
           
            
            $data = array(
                'id_kajian'             => $this->input->post(''),
                'id_masjid'             => $id_masjid,                          
                'judul_kajian'          => $this->input->post('judul_kajian'),
                'deskripsi_kajian'      => $this->input->post('deskripsi_kajian'),
                'tgl_kajian'            => date('Y-m-d', strtotime($this->input->post('tgl_kajian'))),
                'waktu_kajian'          => date('H:i:s', strtotime($this->input->post('waktu_kajian'))),
                'nama_ustadz'           => $this->input->post('nama_ustadz'),
                'poster_kajian'         => $poster                
            );

    

            $this->db->trans_begin();
            $this->Model_kajian->insert($data);
            $id_kajian = $this->db->insert_id();

            // cek jika query berhasil
            if ($this->db->trans_status() === true)  {
                $this->db->trans_commit();
                $message = array('status' => true, 'message' => 'Kajian telah ditambahkan');
            }
            else {
                $this->db->trans_rollback();
                $message = array('status' => true, 'message' => 'Kajian gagal ditambahkan');
            }
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('kajian', 'refresh');
        }
        
        $data['pageTitle'] = 'Tambah Kajian';      
        $data['kajian'] = $this->Model_kajian->get_kajian()->result();
        $data['pageContent'] = $this->load->view('tambah_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            if (!empty($_FILES['poster_kajian']['name'])) {
                // Konfigurasi library upload codeigniter
                $kajian['upload_path'] = './assets/images/poster';
                $kajian['allowed_types'] = 'gif|jpg|jpeg|png';
                $kajian['max_size'] = 2000;
                $kajian['file_name'] = 'poster_';
            
                // Load library upload
                $this->load->library('upload', $kajian);
                
                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('poster_kajian')) {
                    exit($this->upload->display_errors());
                }
                else
                {
                    $poster = $this->upload->data()['file_name'];
                }                                                        
            }
            else
            {
              $poster = $this->input->post('poster_lama');  
            }
            
            $data = array(                                                
                'judul_kajian'          => $this->input->post('judul_kajian'),
                'deskripsi_kajian'      => $this->input->post('deskripsi_kajian'),
                'tgl_kajian'            => date('Y-m-d', strtotime($this->input->post('tgl_kajian'))),
                'waktu_kajian'          => date('H:i:s', strtotime($this->input->post('waktu_kajian'))),
                'nama_ustadz'           => $this->input->post('nama_ustadz'),
                'poster_kajian'         => $poster                
            );
        
            // Jalankan function update pada model
            $id = $this->input->post('id');
            $query = $this->Model_kajian->update($id, $data);


             
            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data kajian telah di perbaharui');
            else $message = array('status' => true, 'message' => 'Data Kajian gagal di perbaharui');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('kajian');
        }


        // Ambil data user dari database
        $kajian = $this->Model_kajian->get_kajian_byId($id);

        // print_r($kajian);
        // die;

        // Jika data user tidak ada maka show 404
        if (!$kajian) show_404();;

        $data['pageTitle'] = 'Update Kajian';      
        $data['kajian'] = $kajian;
        $data['pageContent'] = $this->load->view('update_kajian', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function delete($id = null)
    {
        $kajian = $this->Model_kajian->get_kajian_byId($id);

        if (!$kajian) show_404();
            
        $query = $this->Model_kajian->delete($id);
    
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Kajian telah dihapus');
        else $message = array('status' => true, 'message' => 'Kajian gagal dihapus');
    
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        redirect('kajian', 'refresh');

    }
    
    public function broadcast_kajian($id = '') {
        $kajian = $this->Model_kajian->get_kajian_byId($id);
        if (!$kajian) show_404();
        else {
            $dataDevices = $this->Model_devices->getDeviceAll();
            foreach($dataDevices as $device) {
                send_notif(array($device->token), 'Brodcast Kajian', $kajian->judul_kajian.' - '.$kajian->nama_ustadz, 'KajianActivity');
            }
        }
        redirect('kajian');
    }
}