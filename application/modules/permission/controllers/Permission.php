<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('permission_model');
	}

	public function main($id = 0)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		
		if (!empty($this->input->post()['title'])) {
			$data = $this->permission_model->save($id);
		}
		if (!empty($id)) {
			$id = decrypt_url($id);
			$data = $this->permission_model->delete($id);
		}
		$this->load->view('index', ['data' => @$data]);
	}

	public function main_history($id = 0)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		
		if (!empty($this->input->post()['title'])) {
			$data = $this->permission_model->save($id);
		}
		if (!empty($id)) {
			$id = decrypt_url($id);
			$data = $this->permission_model->delete($id);
		}
		$this->load->view('index', ['data' => @$data]);
	}

	public function edit($id=0) {
		
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[10]');
		
		$data = $this->permission_model->save($id);
		$data['link'] = $this->permission_model->all_link(); 
		$this->load->view('index', ['data' => @$data]);
	}

	public function edit_v1($id=0) {
		
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[10]');

		$data = $this->permission_model->save($id);
		$data['link'] = $this->permission_model->all_link();
		$data['array_child'] = [];
		foreach ($data['link'] as $key => $value) {
			if ($value['to_link'] != 0) {
				$data['array_child'][] = $value['to_link'];
			}
		}
		// print_r($data['data']['group']);die;
		$this->load->view('index', ['data' => @$data]);
	}

	function data_main() {
		$list=$this->permission_model->get_datatables();
		$data=array();
		$no=@$_POST['start'];
		$link = $this->permission_model->all_link();

		foreach ($list as $item) {
			$no++;
			$row=array();
			$edit = '';
			$delete = '';
			if(checkPermission('permission/edit', get_user()['id']) == FALSE){
				$edit = 'disabled'; 
			}elseif(checkPermission('permission/delete', get_user()['id']) == FALSE){
				$delete = 'disabled'; 
			}
			$row[]='<a title="Detail/Edit rows" href="' . BASE_URL('permission/edit_v1/' . encrypt_url($item->id)) . '"class="btn btn-link ' . $edit . '">' . $item->title . '</a>';
			$group = '';
			$no_list = 0;
			if (!empty($item->group)) {
				foreach ($link as $key => $value) {
					if (@in_array($value['id'], @json_decode($item->group))) {
						$no_list++;
						if (empty($group)) {
							$group = $no_list . '.' . $value['title'];
						}else{
							$group = $group . ' <br> ' .$no_list . '.' .  $value['title'];
						}
					}
				}
			}else{
				$group = 'No group List';
			}
			$row[]=$group;
			// add html for action
			$row[]='<a title="Delete rows" href="' . BASE_URL('user/main/' . encrypt_url($item->id)) . '" data-items="' . $item->title . '" class="btn btn-link delete ' . $delete . '"><i class="fas fa-trash-alt"></i></a>';
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

	function data_history() {
		$list=$this->permission_model->get_datatables();
		$data=array();
		$no=@$_POST['start'];
		$link = $this->permission_model->all_link();

		foreach ($list as $item) {
			$no++;
			$row=array();
			$row[]=$item->title;
			$group = '';
			$no_list = 0;
			if (!empty($item->group)) {
				foreach ($link as $key => $value) {
					if (@in_array($value['id'], @json_decode($item->group))) {
						$no_list++;
						if (empty($group)) {
							$group = $no_list . '.' . $value['title'];
						}else{
							$group = $group . ' <br> ' .$no_list . '.' .  $value['title'];
						}
					}
				}
			}else{
				$group = 'No group List';
			}
			$row[]=$group;
			// add html for action
			$row[]='<a title="Restore rows" href="' . BASE_URL('Permission/main/' . encrypt_url($item->id)) . '" data-items="' . $item->title . '" class="btn btn-link restore "><i class="fas fa-undo-alt"></i></a>';
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