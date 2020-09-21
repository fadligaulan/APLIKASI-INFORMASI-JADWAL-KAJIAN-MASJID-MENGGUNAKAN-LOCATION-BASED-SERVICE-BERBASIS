<?php
class Model_masjid extends CI_Model {
    public $tablemasjid = 'masjid';


    public function __construct()
    {
        $this->load->database();

    }

    public function get_data_masjid()
    {
        // get data from table "masjid"
        $query = $this->db->get('masjid');
            return $query->result();
    }
    
     public function get_data_masjid_by_id($id_masjid)
   {
        $this->db->select('*');
        $this->db->from('masjid');
        $this->db->where('id_masjid', $id_masjid);
        return $this->db->get()->result();
   }

    

    public function get_masjid()
    {
        $query = $this->db->get($this->tablemasjid);

        return $query;
    }
  

    public function get_masjid_byId($id)
    {
        $query = $this->db->get_where('masjid', array('id_masjid' => $id))->row();

        // Return hasil query
        return $query;

    }
    

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tablemasjid, $data);

        // Return hasil query
        return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_masjid', $id)
        ->update($this->tablemasjid, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_masjid', $id)
        ->delete($this->tablemasjid);
      
      // Return hasil query
      return $query;
    }



    
}
