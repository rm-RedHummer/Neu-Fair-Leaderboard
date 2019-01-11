<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Main_Controller.php');
class Home extends Main_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('College_Model'); //Loading url helper

  }

	public function index()
	{
		$data['college_names'] = $this->College_Model->get_all_colleges();
		$data['events'] = $this->College_Model->get_all_events();
		$data['colleges'] = $this->College_Model->get_all_colleges_points();
		$this->view('home','home.css','home.js',$data);
  }

	public function add_event_place(){

		$first = $this->input->post('first');
		$second = $this->input->post('second');
		$third = $this->input->post('third');
		$event_id = $this->input->post('event_id');
		$participants = $this->input->post('participants');

		$event = $this->College_Model->get_specific_event($event_id);

		for($ctr = 0; $ctr < count($participants); $ctr++){
			$participant_data = array(
				'event_winner' => $participants[$ctr],
				'event_place' => '0',
				'event_points' => $event->participant,
				'event_id' => $event_id
			);
			$this->College_Model->add_event_place($participant_data);
		}
		$result = true;

		$first_data = array(
			'event_winner' => $first,
			'event_place' => '1',
			'event_points' => $event->first_points,
			'event_id' => $event_id
		);
		$result = $this->College_Model->add_event_place($first_data);


		if($second!="0") {
			$second_points = 0;
			if($second == $first) {
				$second_points = $event->second_points / 2;
			} else if ($second != $first) {
				$second_points = $event->second_points;
			}
			$second_data = array(
				'event_winner' => $second,
				'event_place' => '2',
				'event_points' => $second_points,
				'event_id' => $event_id
			);
			$result = $this->College_Model->add_event_place($second_data);
		}
		if($third!="0"){
			$third_points = 0;
			if($third == $first || $third == $second){
				$third_points = $event->third_points / 2;
			} else if ($third != $first || $third != $second){
				$third_points = $event->third_points;
			}
			$third_data = array(
				'event_winner' => $third,
				'event_place' => '3',
				'event_points' =>$third_points,
				'event_id' => $event_id
			);
			$result = $this->College_Model->add_event_place($third_data);
		}




		$result = $this->College_Model->set_event_done($event_id);

		echo json_encode(array('result'=>$result));
	}

	function console_log( $data ){
	  echo '<script>';
	  echo 'console.log('. json_encode( $data ) .')';
	  echo '</script>';
	}
}
