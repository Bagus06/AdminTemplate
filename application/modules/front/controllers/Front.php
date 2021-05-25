<?php defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('front_model');
	}

	public function index()
	{
	}
	
	public function main($id = 0)
	{
		$data = 0;
		$this->load->view('index', ['data' => @$data]);
	}
}