<?php
class College_Model extends CI_Model {
  function get_all_colleges(){
    $this->db->from('college');
    $this->db->select('*');
    $this->db->order_by('college_name','ASC');
		$result=$this->db->get()->result();
    return $result;
  }

  function get_all_events(){
    $this->db->from('event');
    $this->db->select('*');
    $this->db->order_by('event_name','ASC');
		return $this->db->get()->result();
  }

  function get_all_colleges_points(){
    $this->db->from('place');
    $this->db->select('place.event_id,college.college_id,college.college_name,SUM(place.event_points) as sum');
    $this->db->join('college', 'place.event_winner = college.college_id', 'right');
    $this->db->group_by('college.college_id');
    $this->db->order_by('sum','DESC');
    $this->db->order_by('college.college_name','ASC');
    return $this->db->get()->result();
  }

  function add_event_place($data){
    $result = $this->db->insert('place', $data);
    return $result;
  }

  function set_event_done($event_id){
    $this->db->set('event_finished','done');
    $this->db->where('event_id', $event_id);
    return $this->db->update('event');
  }

  function get_specific_event($event_id){
    $this->db->from('event');
    $this->db->select('*');
    $this->db->where('event_id',$event_id);
    return $this->db->get()->row();
  }
}
