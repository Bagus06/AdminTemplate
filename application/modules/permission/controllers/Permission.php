<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('permission_model');
	}

	public function main($id = 0)
	{
		if (!empty($id)) {
			$id = decrypt_url($id);
			$data = $this->profile_model->delete($id);
		}
		$this->load->view('index', ['data' => @$data]);
	}

	public function edit($id=0) {
		
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[10]');

		$data = $this->permission_model->save($id);
		$data['link'] = $this->permission_model->all_link(); 
		// print_r(@$this->input->post());die;
		$this->load->view('index', ['data' => @$data]);
	}

	function get_ajax() {
		$list=$this->permission_model->get_datatables();
		$data=array();
		$no=@$_POST['start'];
		$link = $this->permission_model->all_link();

		foreach ($list as $item) {
			$no++;
			$row=array();
			$row[]=$no.".";
			$row[]=$item->title;
			$group = '';
			$no = 0;
			foreach ($link as $key => $value) {
				if (in_array($value['id'], @json_decode($item->group))) {
					$no++;
					if (empty($group)) {
						$group = $no . '.' . $value['title'];
					}else{
						$group = $group . ' <br> ' .$no . '.' .  $value['title'];
					}
				}
			}
			$row[]=$group;
			// add html for action
			$row[]='<div class="btn-group">
			<a href="' . BASE_URL('permission/edit/' . encrypt_url($item->id)) . '"class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
			<a href="' . BASE_URL('permission/main/' . encrypt_url($item->id)) . '" data-items="' . $item->title . '" class="btn btn-danger delete"><i class="fas fa-trash"></i></a></div>';
			$data[]=$row;
		}

		$output=array("draw"=> @$_POST['draw'],
			"recordsTotal"=> $this->permission_model->count_all(),
			"recordsFiltered"=> $this->permission_model->count_filtered(),
			"data"=> $data,
		);
	// output to json format
	echo json_encode($output);
	}
}