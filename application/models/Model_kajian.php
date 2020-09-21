<?php
class Model_kajian extends CI_Model {
    public $tablekajian = 'kajian';


    public function __construct()
    {
        $this->load->database();

    }

   public function get_data_kajian()
    {
        $this->db->select('*');
        $this->db->from('kajian');
        $this->db->join('masjid', 'kajian.id_masjid = masjid.id_masjid');
        $this->db->order_by("tgl_kajian", "DESC");
        $query = $this->db->get();

        return $query;
        
    }
    
   public function get_data_kajian_by_id($id_kajian)
   {
        $this->db->select('*');
        $this->db->from('kajian');
        $this->db->join('masjid', 'kajian.id_masjid = masjid.id_masjid');
        $this->db->where('id_kajian', $id_kajian);
        return $this->db->get()->result();
   }


    public function get_kajian()
    {
        $query = $this->db->get($this->tablekajian);

        return $query;
    }

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('kajian');
        $this->db->join('masjid', 'kajian.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function get_kajian_byId($id)
    {
        $query = $this->db->get_where('kajian', array('id_kajian' => $id))->row();

        // Return hasil query
        return $query;

    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tablekajian, $data);

        // Return hasil query
        // return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_kajian', $id)
        ->update($this->tablekajian, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_kajian', $id)
        ->delete($this->tablekajian);
      
      // Return hasil query
      return $query;
    }
    
    
    function getKajianByWaktuKajianBesarDari($tgl_acuan) {
        $query = 'SELECT *
                  from kajian k
                  INNER JOIN masjid m ON m.id_masjid = k.id_masjid
                  where k.tgl_kajian >= ? ORDER BY tgl_kajian DESC';
        return $this->db->query($query, $tgl_acuan)->result();
    }


    
}
