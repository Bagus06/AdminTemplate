<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {}

	public function check_login() {
		$this->user_model->check_login();
	}

	public function token_request() {
		$this->load->view('user/token_request', ['data'=>$this->user_model->token_request()]);
	}

	public function login() {
		$this->load->view('user/login', ['data'=>$this->user_model->login()]);
	}

	public function logout() {
		session_destroy();
		redirect(base_url());
	}

	public function lockscreen() {
		$data = $this->user_model->login();
		if (!empty(@get_user()['username'])) {
			$data['userdata'] = [
				'username' => get_user()['username']
			];
			session_destroy();
			$this->load->view('user/lockscreen', ['data'=>$data]);
		}else{
			$this->load->view('user/login', ['data'=>$data]);
		}
	}

	public function edit($id=0) {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[10]|trim|alpha_numeric_spaces');
		// $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$data=$this->user_model->save($id);
		$data['permission'] = $this->user_model->all_permission();
		$this->load->view('index', ['data'=>$data]);
	}

	public function main($id=0) {
		if( !empty($id)) {
			$id=decrypt_url($id);
			$data=$this->user_model->delete($id);
		}
		$this->load->view('index', ['data' => @$data]);
	}

	function get_ajax() {
		$list=$this->user_model->get_datatables();
		$data=array();
		$no=@$_POST['start'];

		foreach ($list as $item) {
			$no++;
			$row=array();
			$row[]=$no.".";
			$row[]=$item->username;
			$row[]=$item->email;
			// add html for action
			$row[]='<a href="' . BASE_URL('user/edit/' . encrypt_url($item->id)) . '"class="btn btn-info"><i
    class="fas fa-pencil-alt"></i></a><a href="' . BASE_URL('user/main/' . encrypt_url($item->id)) . '"
    data-items="' . $item->username . '" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>';
$data[]=$row;
}

$output=array("draw"=> @$_POST['draw'],
"recordsTotal"=> $this->user_model->count_all(),
"recordsFiltered"=> $this->user_model->count_filtered(),
"data"=> $data,
);
// output to json format
echo json_encode($output);
}
}