<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_sync extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_kajian');
	    $this->load->model('Model_devices');
	    $this->load->model('Model_last_notif_device');
	    $this->load->helper('file');
	    $this->load->helper('distance_helper');
	    $this->load->helper('notification_helper');
	    $this->load->database();
	}

	public function sync_me()
	{
	   /*
	   1. read data post
	   2. cek device
	   3. kalau device belum ada tambahkan device
	   4. kalau sudah ada update token dan last location
	   5. ambil kajian yg belum di mulai
	   6. ambil kajian yang dekat dengan device
	   7. filter hanya kajian yang belum pernah dikirim
	   8. kirim notifikasi
	   */
	   
	   // 1
	   $dataPost = (object) array (
	                                   'device_code'      => $this->input->post('device_code'),
	                                   'token'            => $this->input->post('token'),
	                                   'last_latitude'    => $this->input->post('lat'),
	                                   'last_longitude'   => $this->input->post('long')
	                              );
	                              
	   // 2
	   $dataDevice = $this->Model_devices->getDeviceByCode($dataPost->device_code);
	   
	   // 3
	   if (!$dataDevice) {
	       $this->Model_devices->addDevices($dataPost);
	       $dataDevice = $this->Model_devices->getDeviceByCode($dataPost->device_code);
	   }
	   
	   // 4
	   $this->Model_devices->updateDevice($dataDevice->id_device, $dataPost);
	   
	   // 5 
	   $tgl_acuan   = date('Y-m-d');
	   $upcomingKajian = $this->Model_kajian->getKajianByWaktuKajianBesarDari($tgl_acuan);
	   
	   if ($upcomingKajian) {
	       $forSend = array();
	       foreach($upcomingKajian as $kajian) {
	           // cek jarak device dengan lokasi kajian
	           // 6
	           $distance = distance($kajian->lat, $kajian->lng, $dataPost->last_latitude, $dataPost->last_longitude, 'M'); // by meter
	           if ($distance <= 500) { // by meter
	               
	               // 7
	               $_FORCE = FALSE; // CHANGE 'TRUE' FOR SEND NOTIFICATION EVEN THIS INFO HAS BEN SEND BEFORE IT'S TIME
	               $is_sendPrevious = $this->Model_last_notif_device->getLastNotifByDeviceIdAndKajianId($dataDevice->id_device, $kajian->id_kajian); // Comment this for allowing send mor than 1
	               if ((!$is_sendPrevious || $_FORCE) && (date('Y-m-d H:i:s') <= date('Y-m-d H:i:s',strtotime($kajian->tgl_kajian.' '.$kajian->waktu_kajian)))) {
	                   $forSend[] = $kajian;
	                   // 8
	                   send_notif(array($dataPost->token), 'Kajian Disekitar Anda', $kajian->nama_ustadz.' - '.$kajian->nama_masjid, 'MainActivity');
	                   $dataLastNotif = array(
	                                            'id_device' => $dataDevice->id_device,	
	                                            'id_kajian' => $kajian->id_kajian,	
	                                            'latitude' => $dataPost->last_latitude,	
	                                            'longitude' => $dataPost->last_longitude,	
	                                            'distance' => $distance
	                                        );
	                   
	                   if (!$_FORCE) $this->Model_last_notif_device->addLastNotif($dataLastNotif);
	               }
	           } 
	       }
	       echo json_encode(array('status' => 200, 'message' => 'We Have '.count($forSend).' notifications for you', 'data_notif' => $forSend, 'data_post' => $dataPost));die;
	       
	   } else {
	       echo json_encode(array('status' => 402, 'message' => 'Emty Notification'));
	   }
	   die;
	}
}