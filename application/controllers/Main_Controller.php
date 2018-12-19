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
    
    public function view($page){
        $this->load->view('template/head');
        $this->load->view($page);
        $this->load->view('template/footer');
    }
}
