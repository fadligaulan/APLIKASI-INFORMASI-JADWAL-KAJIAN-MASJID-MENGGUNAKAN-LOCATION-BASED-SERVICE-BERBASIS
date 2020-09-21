<?php
class Model_super_admin extends CI_Model {
    public $tabletakmir = 'takmir';
   

    public function __construct()
    {
        $this->load->database();

    }

    public function get_data_takmir()
    {
        // get data from table "kajian"
        $query = $this->db->get('takmir');
            return $query->result();
    }

    
    public function get_masjid()
    {
        $this->db->select('*');
        $this->db->from('masjid');        
        $this->db->order_by('nama_masjid', 'ASC');
        $query = $this->db->get();

        return $query;
    }

    public function get_takmir()
    {
        $query = $this->db->get($this->tabletakmir);

        return $query;
    }

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('takmir');
        $this->db->join('masjid', 'takmir.id_masjid = masjid.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }



    public function get_takmir_byId($id)
    {
        $query = $this->db->get_where('takmir', array('id_takmir' => $id))->row();

        // Return hasil query
        return $query;

    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tabletakmir, $data);

        // Return hasil query
        return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_takmir', $id)
        ->update($this->tabletakmir, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_takmir', $id)
        ->delete($this->tabletakmir);
      
      // Return hasil query
      return $query;
    }
    
    


    
}
