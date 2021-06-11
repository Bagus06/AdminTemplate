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
		if (!empty(@get_profile()['name'])) {
			$data['userdata'] = [
				'username' => get_user()['username'],
				'name' => get_profile()['name'],
				'photo' => get_profile()['photo'],
			];
			session_destroy();
			$this->load->view('user/lockscreen', ['data'=>$data]);
		}else{
			$this->load->view('user/login', ['data'=>$data]);
		}
	}

	public function address()
	{
		switch ($_GET['tipe']) {
			case 'regency';
				$data = $this->user_model->getRegency();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_regency']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;

			case 'districts';
				$data = $this->user_model->getDistricts();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_districts']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;

			case 'village';
				$data = $this->user_model->getVillage();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_village']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;
		}
	}

	public function edit($id=0) {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[10]|trim|alpha_numeric_spaces');
		// $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$data=$this->user_model->save($id);
		$data['permission'] = $this->user_model->all_permission();
		$data['gender'] = $this->user_model->all_gender();
		$data['province'] = $this->user_model->all_province();
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
			$row[]='<a title="Detail/Edit rows" href="' . BASE_URL('user/edit/' . encrypt_url($item->id)) . '"class="btn btn-link">' . $item->username . '</a>';
			$row[]=$item->email;
			// add html for action
			$row[]='<a title="Delete rows" href="' . BASE_URL('user/main/' . encrypt_url($item->id)) . '" data-items="' . $item->username . '" class="btn btn-link delete"><i class="fas fa-trash-alt"></i></a>';
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