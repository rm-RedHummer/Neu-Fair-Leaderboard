<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Main_Controller.php');
class Home extends Main_Controller {
	public function index()
	{
		$this->view('view_home');
    }
}
