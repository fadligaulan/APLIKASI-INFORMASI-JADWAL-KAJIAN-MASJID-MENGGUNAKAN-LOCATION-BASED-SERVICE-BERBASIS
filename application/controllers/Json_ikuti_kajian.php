<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_ikuti_kajian extends CI_Controller {
	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_kajian');
	    $this->load->model('Model_ikuti_kajian');
	    $this->load->helper('file');
	    $this->load->database();
	}

	public function index()
	{
	    
	    $tanggal    = $this->input->get('tgl_ikuti');
      	$waktuIkuti = $this->input->get('waktu_ikuti');
      	$idKajian   = $this->input->get('id_kajian');
      	$idPeserta  = $this->input->get('id_peserta');
      	
      	$cekDaftarSebelumNya = $this->Model_ikuti_kajian->getIkutiKajianByIdKajianAndIdPeserta($idKajian, $idPeserta);
      	if ($cekDaftarSebelumNya) {
      	    echo "Sudah Terdaftar";
      	} else {
      	    $datakode = $this->Model_ikuti_kajian->getMaxPengikutKajian();
            if($datakode ){
                $nilaikode = substr($datakode->kode, 3);
                $kode = (int) $nilaikode;
                $kode = $kode +1;
                $kode_otomatis = "IK-".str_pad($kode, 4, "0", STR_PAD_LEFT);
            }else {
                $kode_otomatis = "IK-0001";
            }
            
            $data = array (	
                        'id_ikutikajian' => $kode_otomatis,
                        'tgl_ikuti'      => $tanggal,
                        'waktu_ikuti'    => $waktuIkuti,
                        'id_kajian'      => $idKajian,
                        'id_peserta'     => $idPeserta
                );
        
            $this->db->trans_begin();
            $this->Model_ikuti_kajian->addPengikut($data);
            if($this->db->trans_status() === true){
                $this->db->trans_commit();
                echo "Berhasil";
            }else{
                echo "Gagal";
            }
      	}
        
        /*
	    $response = array();
	    $posts = array();
	    foreach ($kajian as $row) 
	    { 
	        $posts[] = array(
	            "id"         			=>  $row->id_kajian,
	            "nama_masjid"       	=>  $row->nama_masjid,
	            "alamat_masjid"     	=>  $row->alamat_masjid,
	            "contact_masjid" 		=>  $row->contact_masjid,
	            "judul_kajian"      	=>  $row->judul_kajian,
	            "deskripsi_kajian"  	=>  $row->deskripsi_kajian,
	            "tgl_kajian"     		=>  $row->tgl_kajian,
	            "waktu_kajian"     	  	=>  $row->waktu_kajian,
	            "nama_ustadz"     	  	=>  $row->nama_ustadz,
	            "jml_peserta_kajian"  	=>  $row->jml_peserta_kajian,
	            "https://infokajianislami.fadligaulan.com/assets/images/poster"     	=>  $row->poster_kajian
	        );
	    } 
	    $response['kajian'] = $posts;
	    echo json_encode($response,TRUE);*/
	}
}
