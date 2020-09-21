<?php
class Model_audio extends CI_Model {
    public $tableaudio = 'audio';
    

    public function __construct()
    {
        $this->load->database();

    }

    public function get_data_audio()
    {
        $this->db->select('*');
        $this->db->from('audio');
        $this->db->join('masjid', 'audio.id_masjid = masjid.id_masjid');
        $query = $this->db->get();

        return $query;
    }
    
    public function get_data_audio_by_id($id_audio)
   {
        $this->db->select('*');
        $this->db->from('audio');
        $this->db->join('masjid', 'audio.id_masjid = masjid.id_masjid');
        $this->db->where('id_audio', $id_audio);
        return $this->db->get()->result();
   }

    public function get_audio()
    {
        $query = $this->db->get($this->tableaudio);

        return $query;
    }

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('audio');
        $this->db->join('masjid', 'audio.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function get_audio_byId($id)
    {
        $query = $this->db->get_where('audio', array('id_audio' => $id))->row();

        // Return hasil query
        return $query;

    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tableaudio, $data);

        // Return hasil query
        return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_audio', $id)
        ->update($this->tableaudio, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_audio', $id)
        ->delete($this->tableaudio);
      
      // Return hasil query
      return $query;
    }


    
}
