<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model {

    public function getKajian()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('id_kajian');
        $this->db->from('kajian');
        $this->db->join('masjid', 'kajian.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'kajian.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);

        $query = $this->db->count_all_results();

        return $query;
    }


    public function getByIdKajian()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('kajian');
        $this->db->join('masjid', 'kajian.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);

        $this->db->order_by('nama_kajian', 'ASC');
        $query = $this->db->get();

        return $query;
    }

    public function count_KajianById()
    {
        $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;

        $this->db->where('id_masjid', $id_masjid);
        $this->db->from('kajian');

        $query = $this->db->count_all_results();
        return $query;
    }


    public function getAudio()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('id_audio');
        $this->db->from('audio');
        $this->db->join('masjid', 'audio.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'audio.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);

        $query = $this->db->count_all_results();

        return $query;
    }


    public function getByIdAudio()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('audio');
        $this->db->join('masjid', 'audio.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function count_AudioById()
    {
        $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;

        $this->db->where('id_masjid', $id_masjid);
        $this->db->from('audio');

        $query = $this->db->count_all_results();
        return $query;
    }

    public function getVideo()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('id_video');
        $this->db->from('video');
        $this->db->join('masjid', 'video.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'video.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);

        $query = $this->db->count_all_results();

        return $query;
    }

    public function getByIdVideo()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('masjid', 'video.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function count_VideoById()
    {
        $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;

        $this->db->where('id_masjid', $id_masjid);
        $this->db->from('video');

        $query = $this->db->count_all_results();
        return $query;
    }

    public function getStreaming()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('id_streaming');
        $this->db->from('streaming');
        $this->db->join('masjid', 'streaming.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'streaming.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);

        $query = $this->db->count_all_results();

        return $query;
    }

    public function getByIdStreaming()
    {
        $id_takmir = $this->session->userdata('id_takmir');
        $this->db->select('*');
        $this->db->from('streaming');
        $this->db->join('masjid', 'streaming.id_masjid = masjid.id_masjid');
        $this->db->join('takmir', 'masjid.id_masjid = takmir.id_masjid');
        $this->db->where('id_takmir', $id_takmir);
        $query = $this->db->get();

        return $query;
    }

    public function count_StreamingById()
    {
        $id_masjid = $this->Model_takmir->get_takmir_byId($this->session->userdata('id_takmir'))->id_masjid;

        $this->db->where('id_masjid', $id_masjid);
        $this->db->from('streaming');

        $query = $this->db->count_all_results();
        return $query;
    }

    // get closest providers
    // around 30 kilo meters from your location
    // by using latitude , longtuide and service id //
    function get_closest_locations($lng,$lat,$ServiceId){
        $results= $this->db->query("SELECT fullname,CONCAT(ci_providers.user_id,',',ServiceDesc) AS dscr,CONCAT(lat,',', lng) as pos,'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
    ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance
    FROM ci_providers
    INNER JOIN ci_services  ON ci_services.user_id = ci_providers.user_id
    AND ci_services.ServiceId = $ServiceId
    HAVING distance <= 30
    ORDER BY distance ASC
      ")->result_array();
        return $results;
    }
    

  

    
	

}

/* End of file Model_dashboard.php */
/* Location: ./application/models/Model_dashboard.php */