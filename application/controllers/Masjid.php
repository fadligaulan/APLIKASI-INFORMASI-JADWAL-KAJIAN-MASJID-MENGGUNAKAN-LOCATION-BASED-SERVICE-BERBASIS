<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masjid extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_masjid');
        // $this->load->model('services_model');
        // $this->load->library('form_validation');
    }

    public function index()
    {   
        // $this->book_service();
        $data['pageTitle'] = 'Data Masjid';      
        $data['masjid'] = $this->Model_masjid->getByID()->result();
        $data['pageContent'] = $this->load->view('data_masjid', $data, TRUE);

        $this->load->view('template/layout', $data);

    }

    public function insert() 
    {
       if ($this->input->post('submit')) {
        if (!empty($_FILES['foto_masjid']['name'])) {
            // Konfigurasi library upload codeigniter
            $masjid['upload_path'] = './assets/foto/masjid';
            $masjid['allowed_types'] = 'gif|jpg|jpeg|png';
            $masjid['max_size'] = 2000;
            $masjid['file_name'] = 'foto_';
                
            // Load library upload
            $this->load->library('upload', $masjid);
                    
            // Jika terdapat error pada proses upload maka exit
            if (!$this->upload->do_upload('foto_masjid')) {
                exit($this->upload->display_errors());
            }
            else
            {
                $foto = $this->upload->data()['file_name'];
            }                                              
        }
            
            $data = array(
                'id_masjid'             => $this->input->post(''),                                              
                'nama_masjid'           => $this->input->post('nama_masjid'),
                'alamat_masjid'         => $this->input->post('alamat_masjid'),
                'lat'                   => $this->input->post('lat'),
                'lng'                   => $this->input->post('lng'),
                'des_masjid'            => $this->input->post('des_masjid'),
                'contact_masjid'        => $this->input->post('contact_masjid'),
                'foto_masjid'           => $foto,
                'thn_berdiri'           => $this->input->post('thn_berdiri')                
            );

            $query = $this->Model_masjid->insert($data);

            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Masjid telah ditambahkan');
            else $message = array('status' => true, 'message' => 'Masjid gagal ditambahkan');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('takmir-masjid/insert', 'refresh');
        }
        $data['pageTitle'] = 'Tambah Masjid';      
        $data['masjid'] = $this->Model_masjid->get_masjid()->result();
        $this->load->view('tambah_masjid', $data);

       
    }

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            if (!empty($_FILES['foto_masjid']['name'])) {
                // Konfigurasi library upload codeigniter
                $masjid['upload_path'] = './assets/foto/masjid';
                $masjid['allowed_types'] = 'gif|jpg|jpeg|png';
                $masjid['max_size'] = 2000;
                $masjid['file_name'] = 'foto_';
            
                // Load library upload
                $this->load->library('upload', $masjid);
                
                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('foto_masjid')) {
                    exit($this->upload->display_errors());
                }
                else
                {
                    $foto = $this->upload->data()['file_name'];
                }                                                        
            }
            else
            {
              $foto = $this->input->post('foto_lama');  
            }
            
            $data = array(                                                
                'nama_masjid'           => $this->input->post('nama_masjid'),
                'alamat_masjid'         => $this->input->post('alamat_masjid'),
                'lat'                   => $this->input->post('lat'),
                'lng'                   => $this->input->post('lng'),
                'des_masjid'            => $this->input->post('des_masjid'),
                'contact_masjid'        => $this->input->post('contact_masjid'),
                'foto_masjid'           => $foto,
                'thn_berdiri'           => $this->input->post('thn_berdiri')               
            );
        
            // Jalankan function update pada model
            $id = $this->input->post('id');
            $query = $this->Model_masjid->update($id, $data);


             
            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data masjid telah di perbaharui');
            else $message = array('status' => true, 'message' => 'Data Masjid gagal di perbaharui');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('masjid');
        }


        // Ambil data user dari database
        $masjid = $this->Model_masjid->get_masjid_byId($id);

        // print_r($masjid);
        // die;

        // Jika data user tidak ada maka show 404
        if (!$masjid) show_404();;

        $data['pageTitle'] = 'Update data Masjid';      
        $data['masjid'] = $masjid;
        $data['pageContent'] = $this->load->view('update_masjid', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function delete($id = null)
    {
        $masjid = $this->Model_masjid->get_masjid_byId($id);

        if (!$masjid) show_404();
            
        $query = $this->Model_masjid->delete($id);
    
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Masjid telah dihapus');
        else $message = array('status' => true, 'message' => 'Masjid gagal dihapus');
    
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        redirect('masjid', 'refresh');

    }

}