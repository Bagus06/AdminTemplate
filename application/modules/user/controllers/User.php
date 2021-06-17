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
			case 'regencyPob';
				$data = $this->user_model->getRegency();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_regencyPob']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;

			case 'districtsPob';
				$data = $this->user_model->getDistricts();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_districtsPob']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;

			case 'villagePob';
				$data = $this->user_model->getVillage();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_villagePob']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			case 'regencyResidence';
				$data = $this->user_model->getRegency();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_regencyResidence']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;

			case 'districtsResidence';
				$data = $this->user_model->getDistricts();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_districtsResidence']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;

			case 'villageResidence';
				$data = $this->user_model->getVillage();
				foreach($data as $key => $value){
					$selected = '';
                    if ($value['id'] == @$_POST['id_villageResidence']) {
                        $selected = 'selected';
                    }  
					echo '<option value="'.$value['id'].'" ' . $selected . '>'.$value['name'].'</option>';
				}
			break;
		}
	}

	public function edit($id=0) {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[10]|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]');
		$this->form_validation->set_rules('permission_id', 'Permission', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[10]|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('hp', 'Hp', 'required|min_length[11]|max_length[13]|numeric');
		$this->form_validation->set_rules('name', 'Name', 'required|trim|alpha_numeric_spaces|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('nik', 'Nik','required|min_length[16]|max_length[16]|numeric|trim|alpha_numeric_spaces');
		
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

	public function main_history($id=0) {
		if( !empty($id)) {
			$id=decrypt_url($id);
			$data=$this->user_model->delete($id);
		}
		$this->load->view('index', ['data' => @$data]);
	}
	
	function data_main() {
		$list=$this->user_model->get_datatables();
		$data=array();
		$no=@$_POST['start'];
		
		foreach ($list as $item) {
			$no++;
			$row=array();
			$edit = '';
			$delete = '';
			if(checkPermission('user/edit', get_user()['id']) == FALSE){
				$edit = 'disabled'; 
			}elseif(checkPermission('user/delete', get_user()['id']) == FALSE){
				$delete = 'disabled'; 
			}
			$row[]='<a title="Detail/Edit rows" href="' . BASE_URL('user/edit/' . encrypt_url($item->id)) . '"class="btn btn-link ' . $edit . '">' . $item->username . '</a>';
			$row[]=$item->email;
			// add html for action
			$row[]='<a title="Delete rows" href="' . BASE_URL('user/main/' . encrypt_url($item->id)) . '" data-items="' . $item->username . '" class="btn btn-link delete ' . $delete . '"><i class="fas fa-trash-alt"></i></a>';
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

	function data_history() {
		$list=$this->user_model->get_datatables();
		$data=array();
		$no=@$_POST['start'];
		
		foreach ($list as $item) {
			$no++;
			$row=array();
			$row[]=$item->username;
			$row[]=$item->email;
			// add html for action
			$row[]='<a title="Restore rows" href="' . BASE_URL('user/main_history/' . encrypt_url($item->id)) . '" data-items="' . $item->username . '" class="btn btn-link restore"><i class="fas fa-undo-alt"></i></a>';
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