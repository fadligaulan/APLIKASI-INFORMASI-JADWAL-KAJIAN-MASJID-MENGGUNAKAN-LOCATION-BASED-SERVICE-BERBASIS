<?php
class Model_last_notif_device extends CI_Model {
    public $table = 'last_notif_device';

    function getLastNotifByDeviceIdAndKajianId($id_device, $id_kajian) {
        return $this->db->get_where($this->table, array('id_device' => $id_device, 'id_kajian' => $id_kajian))->row();
    }
    
    function addLastNotif($data) {
        $this->db->insert($this->table, $data);
    } 
    
}
    
?>