<?php defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('link_model');
	}

	public function index()
	{
	}

	public function check_login()
	{
		$this->link_model->check_login();
	}

	public function edit($id = 0)
	{
		$this->form_validation->set_rules('to_link', 'To_link', 'required');

		$data = $this->link_model->save($id);
		$data['all'] = $this->link_model->all();
		// print_r($data['data']);die;
		$this->load->view('index', ['data' => $data]);
	}

	public function order()
	{
		$data = $this->link_model->order_save();
		$data['all'] = $this->link_model->all();
 		$this->load->view('index', ['data' => $data]);
	}
	
	public function main($id = 0)
	{
		if (!empty($id)) {
			$id = decrypt_url($id);
			$data = $this->link_model->delete($id);
		}
		$this->load->view('index', ['data' => @$data]);
	}

	private function array_user_has_link()
	{
		$return = [];

		$data = $this->link_model->all_user_has_link();
		foreach ($data as $key => $value) {
			$data[] = $value['id'];
		}

		return $data;
	}

	function get_ajax()
	{
		$it = @$_GET['it'];
		$list = $this->link_model->get_datatables($it);
		$data = array();
		$no = @$_POST['start'];
		$link_all = $this->link_model->all();
		// print_r($array_user_has_link);die;
		
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $item->title;
			$row[] = $item->link;
			$to = '';
			foreach($link_all as $key => $value){
				if ($item->to_link == 0) {
					$to = 'master';
				}elseif($value['id'] == $item->to_link){
					$to = $value['title'];
				}
			}
			$row[] = $to;
			// add html for action
			$row[] = '<a href="' . BASE_URL('link/edit/' . encrypt_url($item->id)) . '"class="btn btn-info"><i
			class="fas fa-pencil-alt"></i></a><a href="' . BASE_URL('link/main/' . encrypt_url($item->id)) . '"
			data-items="' . $item->title . '" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>';
			$data[] = $row;
		}
		
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->link_model->count_all(),
			"recordsFiltered" => $this->link_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
}