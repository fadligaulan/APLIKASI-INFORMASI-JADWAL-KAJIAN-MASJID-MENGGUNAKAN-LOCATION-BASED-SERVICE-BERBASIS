<?php
class Model_devices extends CI_Model {
    public $table = 'devices';

    function getDeviceByCode($device_code) {
        return $this->db->get_where($this->table, array('device_code' => $device_code))->row();
    }

    function addDevices($data) {
        $this->db->insert($this->table, $data);
    }
    
    function getDeviceAll(){
        return $this->db->get($this->table)->result();
    }

    function updateDevice($id_device, $data) {
        $this->db->where('id_device',$id_device);
        $this->db->update($this->table, $data);
    }
}

?>