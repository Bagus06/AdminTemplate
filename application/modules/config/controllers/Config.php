<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('config_model');
	}

	public function edit($id=0) {
		$data = $this->config_model->save($id);
		$data['data'] = $this->config_model->all();
		foreach ($data['data'] as $key => $value) {
			$data['data'][$value['title']] = ['title' => $value['title'], 'value' => json_decode($value['value'])];
		}
		$this->load->view('index', ['data' => @$data]);
	}
}