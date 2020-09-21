<?php
class Model_register extends CI_Model {
    public $table = 'takmir';
    

    
    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->table, $data);

        // Return hasil query
        return $query;
    }

    
}
