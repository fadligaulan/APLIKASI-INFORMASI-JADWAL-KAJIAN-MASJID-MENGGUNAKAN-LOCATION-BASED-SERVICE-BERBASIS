<?php
class Model_streaming extends CI_Model {
    public $tablestreaming = 'streaming';


    public function __construct()
    {
        $this->load->database();

    }

    public function get_data_streaming()
    {
        $this->db->select('*');
        $this->db->from('streaming');
        $this->db->join('masjid', 'streaming.id_masjid = masjid.id_masjid');
        $query = $this->db->get();
        
        return $query;
    }
    
    public function get_data_streaming_by_id($id_streaming)
   {
        $this->db->select('*');
        $this->db->from('streaming');
        $this->db->join('masjid', 'streaming.id_masjid = masjid.id_masjid');
        $this->db->where('id_streaming', $id_streaming);
        return $this->db->get()->result();
   }
    

    public function get_streaming()
    {
        $query = $this->db->get($this->tablestreaming);

        return $query;
    }

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('streaming');
        $this->db->join('masjid', 'streaming.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function get_streaming_byId($id)
    {
        $query = $this->db->get_where('streaming', array('id_streaming' => $id))->row();

        // Return hasil query
        return $query;

    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tablestreaming, $data);

        // Return hasil query
        return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_streaming', $id)
        ->update($this->tablestreaming, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_streaming', $id)
        ->delete($this->tablestreaming);
      
      // Return hasil query
      return $query;
    }


    
}
