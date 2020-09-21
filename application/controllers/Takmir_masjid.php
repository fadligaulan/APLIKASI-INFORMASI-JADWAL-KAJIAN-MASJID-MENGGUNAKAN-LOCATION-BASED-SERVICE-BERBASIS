<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Takmir_masjid extends CI_Controller {

	 public function __construct()
    {
         parent::__construct();
         $this->load->model('Model_takmir');
         $this->load->model('Model_masjid');
         
    }

    public function index()
    {
        $data['pageTitle'] = 'Takmir masjid';      
        $data['takmir'] = $this->Model_takmir->getByID()->result();
        $data['pageContent'] = $this->load->view('data_takmir', $data, TRUE);

        $this->load->view('template/layout', $data);

    }



    public function insert() 
    {

       if ($this->input->post('submit')) {
        if (!empty($_FILES['foto_takmir']['name'])) {
            // Konfigurasi library upload codeigniter
            $takmir['upload_path'] = './assets/foto/takmir';
            $takmir['allowed_types'] = 'gif|jpg|jpeg|png';
            $takmir['max_size'] = 2000;
            $takmir['file_name'] = '';
                
            // Load library upload
            $this->load->library('upload', $takmir);
                    
            // Jika terdapat error pada proses upload maka exit
            if (!$this->upload->do_upload('foto_takmir')) {
                exit($this->upload->display_errors());
            }
            else
            {
                $foto = $this->upload->data()['file_name'];
            }                                              
        }
            $foto =$this->input->post('foto_takmir');
            
            $data = array(
                'id_takmir'            => $this->input->post(''),
                'id_masjid'            => $this->input->post('id_masjid'),                                          
                'nama_takmir'          => $this->input->post('nama_takmir'),
                'no_hp'                => $this->input->post('no_hp'),
                'alamat'               => $this->input->post('alamat'),
                'username'             => $this->input->post('username'),
                'pwd'                  => md5($this->input->post('pwd')),
                'foto_takmir'          => $foto                
            );

            $query = $this->Model_takmir->insert($data);

            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Takmir_masjid telah ditambahkan');
            else $message = array('status' => true, 'message' => 'Takmir_masjid gagal ditambahkan');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('auth/login');
        }

        $data['pageTitle'] = 'Tambah Takmir_masjid';      
        $data['takmir_masjid'] = $this->Model_takmir->get_masjid()->result();
        $this->load->view('register', $data);
    }

    public function update($id = null)
    {
        $id = $this->session->userdata('id_takmir');
        if ($this->input->post('submit')) {
            if (!empty($_FILES['foto_takmir']['name'])) {
                // Konfigurasi library upload codeigniter
                $takmir['upload_path'] = './assets/foto/takmir';
                $takmir['allowed_types'] = 'gif|jpg|jpeg|png';
                $takmir['max_size'] = 2000;
                $takmir['file_name'] = '';
            
                // Load library upload
                $this->load->library('upload', $takmir);
                
                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('foto_takmir')) {
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
            
            $prevData = $this->Model_takmir->get_takmir_byId($id);

            $data = array(                                                
                'nama_takmir'          => $this->input->post('nama_takmir'),
                'no_hp'                => $this->input->post('no_hp'),
                'alamat'               => $this->input->post('alamat'),
                'username'             => $this->input->post('username'),
                'pwd'                  => $this->input->post('pwd') == $prevData->pwd ? $prevData->pwd : md5($this->input->post('pwd')),
                'foto_takmir'          => $foto                
            );
        
            // Jalankan function update pada model
            // $id = $this->input->post('id');
            // echo $id.' - ';
            // print_r($data);die;
            $query = $this->Model_takmir->update($id, $data);

            // data user dalam bentuk array
            $userData = array(
                'foto_takmir' => $foto 
            );
            // set session untuk user
            $this->session->set_userdata($userData);    

             
            // cek jika query berhasil
            if ($query) $message = array('status' => true, 'message' => 'Data takmir telah di perbaharui');
            else $message = array('status' => true, 'message' => 'Data Takmir_masjid gagal di perbaharui');
        
            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // refresh page
            redirect('takmir-masjid');
        }


        // Ambil data user dari database
        $takmir = $this->Model_takmir->get_takmir_byId($id);

        // print_r($takmir);
        // die;

        // Jika data user tidak ada maka show 404
        if (!$takmir) show_404();;

        $data['pageTitle'] = 'Update Takmir_masjid';      
        $data['takmir'] = $takmir;
        $data['pageContent'] = $this->load->view('update_takmir', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

    public function delete($id = null)
    {
        $takmir = $this->Model_takmir->get_takmir_byId($id);

        if (!$takmir) show_404();
            
        $query = $this->Model_takmir->delete($id);
    
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Takmir_masjid telah dihapus');
        else $message = array('status' => true, 'message' => 'Takmir_masjid gagal dihapus');
    
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        redirect('takmir', 'refresh');

    }
}
?>