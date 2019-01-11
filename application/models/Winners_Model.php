<?php
class Winners_Model extends CI_Model {
  function get_event_winners(){
    $this->db->from('place');
    $this->db->select('event.event_name, college.college_name, place.event_place');
    $this->db->join('event', 'place.event_id = event.event_id');
    $this->db->join('college', 'place.event_winner = college.college_id');
    $this->db->where('place.event_place = \'1\' or place.event_place = \'2\' or place.event_place = \'3\'');
    $this->db->order_by('event.event_name,place.event_place');
    return $this->db->get()->result();
  }
}
