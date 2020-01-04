<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/awal');
	}

	public function login()
	{
		$this->load->view('pages/login');
	}
}
