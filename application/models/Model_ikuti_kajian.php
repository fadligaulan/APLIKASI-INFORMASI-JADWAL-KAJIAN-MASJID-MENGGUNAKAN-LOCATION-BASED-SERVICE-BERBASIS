<?php
class Model_ikuti_kajian extends CI_Model {
    public $tableikuti_kajian = 'ikuti_kajian';


    public function __construct()
    {
        $this->load->database();

    }

    public function get_data_ikuti_kajian()
    {
        $this->db->select('*');
        $this->db->from('ikuti_kajian');
        $query = $this->db->get()->result();

        return $query;
        
    }
    public function get_data_kajian_by_id($id_kajian)
   {
        $this->db->select('*');
        $this->db->from('kajian');
        $this->db->where('id_kajian', $id_kajian);
        return $this->db->get()->result();
   }
   
   public function getIkutiKajianByIdKajianAndIdPeserta($idKajian, $idPeserta) {
       return $this->db->query("SELECT * FROM ikuti_kajian WHERE id_peserta = ? and id_kajian = ?", array($idKajian, $idPeserta))->row();
   }
   
   public function getMaxPengikutKajian() {
       return $this->db->query("SELECT max(kj.id_ikutikajian) as kode FROM ikuti_kajian kj")->row();
   }
   
   public function addPengikut($data) {
       $this->db->insert('ikuti_kajian', $data);
   }
   
}