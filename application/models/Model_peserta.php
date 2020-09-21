<?php
class Model_peserta extends CI_Model {
    public $tablepeserta = 'peserta';


    public function get_peserta()
    {
        $query = $this->db->get($this->tablepeserta)->result();

        return $query;
    }

    public function getByID()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('masjid', 'peserta.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function get_peserta_byId($id)
    {
        $query = $this->db->get_where('peserta', array('id_peserta' => $id))->row();

        // Return hasil query
        return $query;

    }

    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->tablepeserta, $data);

        // Return hasil query
        // return $query;
    }

    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_peserta', $id)
        ->update($this->tablepeserta, $data);
        
        // Return hasil query
        return $query;
    }
    public function delete($id)
    {
        // Jalankan query
      $query = $this->db
        ->where('id_peserta', $id)
        ->delete($this->tablepeserta);
      
      // Return hasil query
      return $query;
    }


    
}
