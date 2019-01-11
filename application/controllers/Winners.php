<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Main_Controller.php');
class Winners extends Main_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Winners_Model'); //Loading url helper

  }

	public function index()
	{
    $winners = [];
    $temp_winners = $this->Winners_Model->get_event_winners();
    $winner_array = [];
    $ctr = 0;
    foreach($temp_winners as $winner){
      array_push($winner_array,$winner);

      if($ctr == 2 || $winner->event_name == "NEU Acapella"){
        array_push($winners,$winner_array);
        $ctr = 0;
        $winner_array= [];

      } else {
        $ctr = $ctr + 1;
      }
    }
    $data['winners'] = $winners;
    $data['place'] = ['1st','2nd','3rd'];
		$this->view('winners','winners.css',null,$data);
  }
}
