<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_Controller extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->helper('url'); //Loading url helper
    $this->load->database();
    $this->load->library('session');
  }

  public function view($page,$css,$js,$data){
		$data['css'] = $css;
		$data['js'] = $js;
    $this->load->view('template/head',$data);
    $this->load->view($page,$data);
    $this->load->view('template/footer',$data);
  }
}
