<?php

class Site extends CI_Controller {

	//home page
	function index(){	
		$this->load->view('header');
		$this->load->view('nav_template');
		$this->load->view('home');
		$this->load->view('footer');
	} 

}

