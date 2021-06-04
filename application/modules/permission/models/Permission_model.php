<?php defined('BASEPATH') or exit('No direct script access allowed');

class Permission_model extends CI_model
{
	public function all()
	{
		return $this->db->get('permission')->result_array();
	}

	public function all_link()
	{
		return $this->db->get_where('link')->result_array();
	}

	public function save($id)
	{
		$msg = [];
		if (!empty($id)) {
			$id = decrypt_url($id);
		}

		if (!empty($this->input->post())) {
			$data = $this->input->post();
			$data['title'] = strtoupper($data['title']);
			print_r($data);die;
			foreach ($data['group'] as $key) {
				$this->db->select('id');
				$get_master = $this->db->get_where('link', ['to_link' => 0, 'id' => $key])->row_array();
				$this->db->select('id');
				$get_chield = $this->db->get_where('link', ['to_link' => @$get_master['id']])->result_array();
				foreach ($get_chield as $key => $value) {
					if (!in_array($value['id'], $data['group'])) {
						$data['group'][] = $value['id'];
					}
				}
			}
			$data['group'] = json_encode($data['group']);

			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('permission', ['title' => $data['title']])->row_array();
				$current_data = $this->db->get_where('permission', ['id' => $id])->row_array();
				if (($exist['id'] == $current_data['id']) || empty($exist['id'])) {
					$this->db->where('id', $id);
					if ($this->db->update('permission', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
					}else{
						$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
					}
				}else{
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			}else{
				$this->db->select('id');
				$exist = $this->db->get_where('permission', ['title' => $data['title']])->row_array();
				if ($this->db->insert('permission', $data)) {
					$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
				}else{
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			}
		}

		if (!empty($id)) {
			$msg['data'] = $this->db->get_where('permission', ['id' => $id])->row_array();
			$msg['data']['group'] = json_decode($msg['data']['group']);
		}

		return $msg;
	}

	// start datatables
    var $column_order = array(null, 'title'); //set column field database for datatable orderable
    var $column_search = array('title'); //set column field database for datatable searchable
    var $order = array('title' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('*');
        $this->db->from('permission');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('permission');
        return $this->db->count_all_results();
    }
    // end datatables
}