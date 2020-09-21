<?php
class Model_video extends CI_Model {
    public $tablevideo = 'video';


    public function __construct()
    {
        $this->load->database();

    }

    public function get_data_video()
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('masjid', 'video.id_masjid = masjid.id_masjid');
        $query = $this->db->get();
        
        return $query;
    }
    
    public function get_data_video_by_id($id_video)
   {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('masjid', 'video.id_masjid = masjid.id_masjid');
        $this->db->where('id_video', $id_video);
        return $this->db->get()->result();
   }
    

    public function get_video()
    {
        $query = $this->db->get($this->tablevideo);

        return $query;
    }

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('masjid', 'video.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function get_video_byId($id)
    {
        $query = $this->db->get_where('video', array('id_video' => $id))->row();

        // Return hasil query
        return $query;

    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tablevideo, $data);

        // Return hasil query
        return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_video', $id)
        ->update($this->tablevideo, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_video', $id)
        ->delete($this->tablevideo);
      
      // Return hasil query
      return $query;
    }


    
}
