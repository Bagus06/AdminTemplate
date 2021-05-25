<?php defined('BASEPATH') or exit('No direct script access allowed');

class Link_model extends CI_model
{	
	public function save($id = 0, $data = array())
	{
		$msg = [];
		if (!empty($id)) {
			$id = decrypt_url($id);
		}
		if ((!empty($this->input->post())) && ($this->form_validation->run() == true)) {
			if (empty($data)) {
				$data = $this->input->post();
			}
			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('link', ['title' => $data['title']])->row_array();
				$current_data = $this->db->get_where('link', ['id' => $id])->row_array();
				if ($current_data['id'] == @$exist['id'] || empty($exist)) {
					$this->db->where('id', $id);
					if ($this->db->update('link', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
					}
				} else {
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			} else {
				$this->db->select('id');
				$exist = $this->db->get_where('link', ['title' => $data['title']])->row_array();
				if (empty($exist)) {
					if ($this->db->insert('link', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
					}
				} else {
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			}
		}
		if (!empty($id)) {
			$this->db->where(['link.id' => $id]);
			$msg['data'] = $this->db->get('link')->row_array();
		}
		return $msg;
	}

	public function order_save()
	{
		if (!empty($this->input->post())) {
			$data = $this->input->post();
			$data = json_decode($data['order']);

			$order = 1;
			foreach ($data as $key => $value) {
				$this->db->where('id', $value->id);
				$this->db->set(['nestable' => $order]);
				$this->db->update('link');
				$order++;
			}

			return ['status' => 'success', 'msg' => 'Data has been inputed'];
		}
	}

	public function all()
	{
		$this->db->order_by('nestable', 'ASC');
		return $this->db->get('link')->result_array();
	}

	public function all_user_has_link()
	{
		return $this->db->get('user_has_link')->result_array();
	}

	public function delete($id = 0)
	{
		if (!empty($id)) {
			$this->db->select('id');
			$current_data = $this->db->get_where('link', ['id' => $id])->row_array();
			if (!empty($current_data)) {
				if ($this->db->delete('link', ['id' => $id])) {
					return ['status' => 'success', 'msg' => 'Data has been deleted'];
				} else {
					return ['status' => 'danger', 'msg' => 'Data failed to delete'];
				}
			} else {
				redirect(base_url('link/main'));
			}
		}
	}

	// start datatables
	var $column_order = array(null, 'title', 'link', 'to_link'); //set column field database for datatable orderable
	var $column_search = array('title', 'link'); //set column field database for datatable searchable
	var $order = array('link' => 'asc'); // default order 

	private function _get_datatables_query($it=0)
	{
		// print_r($it);die;
		$this->db->select('*');
		$this->db->from('link');

		$i = 0;
		foreach ($this->column_search as $item) { // loop column 
			if (@$_POST['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	
	function get_datatables($it=0)
	{
		$this->_get_datatables_query($it);
		if (@$_POST['length'] != -1)
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from('link');
		return $this->db->count_all_results();
	}
	// end datatables
}