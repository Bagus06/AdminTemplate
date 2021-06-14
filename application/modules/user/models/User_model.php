<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
	private function _uploadPhoto()
    {	
        $filename = 'photo-' . date("Y-m-d-h-i-sa");
        $config['upload_path']          = './assets/images/upload/user_profile';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $filename;
        // $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        //$config['min_width']            = 1920;
        //$config['min_height']           = 1128;
        //$config['max_width']            = 1920;
        //$config['max_height']           = 1128;

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		
        if ($this->upload->do_upload('photo')) {
			$uploadedImage = $this->upload->data();
			if ($uploadedImage['file_size'] > 1024) {
				$resizeTo = 0;
				$resizeTo = $uploadedImage['file_size'] / 1000;
				$resizeTo = $uploadedImage['image_width'] / ceil($resizeTo);
				$source_path = './assets/images/upload/user_profile/' . $uploadedImage['file_name'];
				$target_path = './assets/images/upload/user_profile/';
				$config_manip = array(
					'image_library' => 'gd2',
					'source_image' => $source_path,
					'new_image' => $target_path,
					'maintain_ratio' => TRUE,
					'width' => ceil($resizeTo)
				);
				$this->load->library('image_lib', $config_manip);
				$this->image_lib->resize();
				$this->image_lib->rotate();
				$this->image_lib->clear();
			}
            return $this->upload->data("file_name");
        }
        return "default.png";
    }

	private function _deleteFoto($image_name)
    {
        if ($image_name != "default.jpg") {
            $filename = explode(".", $image_name)[0];
            return array_map('unlink', glob(FCPATH . "/assets/images/upload/user_profile/$filename.*"));
        }
    }

	public function check_login()
	{
		if (empty($this->session->userdata(str_replace('/', '_', base_url() . '_logged_in')))) {
			$curent_url = base_url($_SERVER['PATH_INFO']);
			$curent_url = urlencode($curent_url);
			redirect(base_url() . 'front/main');
		} else {
			$this->db->select('permission.group');
			$this->db->from('user');
			$this->db->join('permission', 'permission.id=user.permission_id');
			$this->db->where('user.id', get_user()['id']);
			$get_permission = $this->db->get()->row_array();
			$open_link = $this->uri->rsegments[1] . '/' . $this->uri->rsegments[2];
			$this->db->select('id');
			$open_link = $this->db->get_where('link', ['link' => $open_link])->row_array();

			if(!empty($get_permission['group'])){
				if (empty($this->uri->rsegments[1] . '/' . $this->uri->rsegments[2]) || ($this->uri->rsegments[1] == 'front')) {
					die;
				}elseif (!in_array(@$open_link['id'], json_decode($get_permission['group']))) {
					redirect(base_url() . '403');
				}
			}

			if (!empty($_COOKIE[base_url() . '_username'])) {
				$data['username'] = @$_COOKIE[base_url() . '_username'];
				$data['password'] = @$_COOKIE[base_url() . '_password'];
				$data['remember_me'] = @$_COOKIE[base_url() . '_remember_me'];
				$this->set_cookie($data);
				$user = $this->CI->db->query('SELECT * FROM user WHERE username = ? LIMIT 1', @$data['username'])->row_array();
				if (!empty($user)) {
					if (decrypt($data['password'], $user['password'])) {
						$url = @$_GET['redirect_to'];
						if (!empty($url)) {
							$url = urldecode($url);
						} else {
							$url = 'admin/index';
						}
						$this->CI->session->set_userdata(base_url() . '_logged_in', $user);
						$this->save_ip($user['id']);
					}
				}
			}
		}
	}

	public function login()
	{
		if ($this->uri->rsegments[2] != 'lockscreen') {
			if (empty($this->session->userdata(str_replace('/', '_', base_url() . '_logged_in')))) {
			} else {
					$url = 'dashboard/main';
					redirect($url);
			}
		}
		$data = $this->input->post();
		$msg = [];
		if (!empty($data)) {
			$user = $this->db->query('SELECT * FROM user WHERE username = ?', $data['username'])->row_array();
			if (!empty($user)) {
				if (!decrypt($data['password'], $user['password'])) {
					$msg = ['status' => 'error', 'msg' => 'password tidak sesuai'];
				} else {
					$url = @$_GET['redirect_to'];
					if (!empty($url)) {
						$url = urldecode($url);
					} else {
						$url = 'dashboard/main';
					}

					$this->session->set_userdata(str_replace('/', '_', base_url() . '_logged_in'), $user);
					redirect($url);
				}
			} else {
				$msg = ['status' => 'error', 'msg' => 'username tidak diketahui'];
			}
		}
		return $msg;
	}

	private function generateRandomString() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		$length = 25;
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function token_request($id = 0)
	{
		$msg = [ ];
		if (!empty($this->input->post())) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Jakarta');
			$date = date('Y-m-d h:i:s');
			$date = date('Y-m-d H:i:s', strtotime('+ 10 minute', strtotime($date)));
			$data = [
				'number' => $data['hp'],
				'link_token' =>'',
				'expired' => $date
			];
			$validation = true;

			// validation_condition

			$this->db->select('id');
			$current_data = $this->db->get_where('token_request', ['number' => $data['number']])->row_array();
			if ($validation == true) {
				if (!empty($id)) {
				# code...
				}else{
					if (empty($current_data)) {
						if ($this->db->insert('token_request', $data)) {
							$msg = ['status' => 'success', 'msg' => 'The request was successfully sent to the administrator'];
						}else{
							$msg = ['status' => 'error', 'msg' => 'The request failed to be sent to the administrator'];
						}
					}else{
						$msg = ['status' => 'error', 'msg' => 'You have requested a few minutes ago, please check your email. If not, please contact Custommer Service'];
					}
				}
			}
		}
		return $msg;
	}

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
			$user = [
				'username' => $data['username'],
				'password' => $data['password'],
				'permission_id' => $data['permission_id'],
				'email' => $data['email']
			];

			$data['photo'] = @$this->_uploadPhoto();
			
			if(!preg_match('/[^+0-9]/',trim($data['hp']))){
				// cek apakah no hp karakter 1-3 adalah +62
				if(substr(trim($data['hp']), 0, 3)=='62'){
					$data['hp'] = trim($data['hp']);
				}
				// cek apakah no hp karakter 1 adalah 0
				elseif(substr(trim($data['hp']), 0, 1)=='0'){
					$data['hp'] = '62'.substr(trim($data['hp']), 1);
				}
			}
			$data['place_of_birth'] = [
				'province' => $data['provincePob'],
				'regency' => $data['regencyPob'],
				'districts' => $data['districtsPob'],
				'village' => $data['villagePob']
			];
			$data['place_of_birth'] = @json_encode($data['place_of_birth']);
			$data['residence'] = [
				'province' => $data['provinceResidence'],
				'regency' => $data['regencyResidence'],
				'districts' => $data['districtsResidence'],
				'village' => $data['villageResidence']
			];
			$data['residence'] = @json_encode($data['residence']);

			$profile = [
				'user_id' => @$id,
				'name' => $data['name'],
				'gender' => $data['gender'],
				'photo' => @$data['photo'],
				'place_of_birth' => $data['place_of_birth'],
				'residence' => $data['residence'],
				'date_of_birth' => $data['date_of_birth'],
				'address' => @$data['address'],
				'nik' => $data['nik'],
				'hp' => $data['hp']
			];
			 
			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('user', ['username' => $user['username']])->row_array();
				$current_user = $this->db->get_where('user', ['id' => $id])->row_array();
				$current_profile = $this->db->get_where('profile', ['user_id' => $id])->row_array();
				
				if(!empty($_FILES['photo']['name'])){
					if ($current_profile['photo'] != null) {
						$filename = explode(".", $current_profile['photo'])[0];
						array_map('unlink', glob(FCPATH . "/assets/images/upload/user_profile/$filename.*"));
					}
				}else{
					$profile['photo'] = $current_profile['photo'];
				}

				if (empty($user['password'])) {
					$user['password'] = $current_user['password'];
				} elseif (!empty($user['password'])) {
					$user['password'] = encrypt($user['password']);
				}
					
				if ($current_user['id'] == @$exist['id'] || empty($exist)) {
					// print_r($profile);die;
					$this->db->where('id', $id);
					if ($this->db->update('user', $user)) {
						$this->db->where('user_id', $id);
						$this->db->update('profile', $profile);
						$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
					}
				} else {
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			} else {
				$this->db->select('id');
				$exist = $this->db->get_where('user', ['username' => $data['username']])->row_array();
				if (empty($exist)) {
					if ($this->db->insert('user', $user)) {
						$profile['user_id'] = $this->db->insert_id();
						$this->db->insert('profile', $profile);
						$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
					}
				} else {
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			}
		}
		if (!empty($id)) {
			$this->db->select('user.*, profile.*,profile.id as profile_id');
			$this->db->from('user');
			$this->db->join('profile', 'profile.user_id=user.id');
			$this->db->where(['user.id' => $id]);
			$msg['data'] = $this->db->get()->row_array();
			// print_r($msg['data']);die;
		}
		return $msg;
	}

	public function all()
	{
		return $this->db->get('user')->result_array();
	}

	public function all_permission()
	{
		return $this->db->get('permission')->result_array();
	}

	public function all_gender()
	{
		$msg = [];
		$msg = [
			[
				'id' => 0,
				'title' => 'Perempuan'
			],
			[
				'id' => 1,
				'title' => 'Laki-laki'
			]
		];
		return $msg;
	}

	public function all_province()
	{
		$this->db->order_by('name', 'ASC');
		return $this->db->get('provinces')->result_array();
	}
	
	public function getRegency($id = 0)
	{
		$id = @$_POST['id_provinces'];
		$this->db->order_by('name', 'ASC');
		return $this->db->get_where('regencies', ['province_id' => $id])->result_array();
	}

	public function getDistricts($id = 0)
	{
		$id = @$_POST['id_regencies'];
		$this->db->order_by('name', 'ASC');
		return $this->db->get_where('districts', ['regency_id' => $id])->result_array();
	}

	public function getVillage($id = 0)
	{
		$id = @$_POST['id_district'];
		$this->db->order_by('name', 'ASC');
		return $this->db->get_where('villages', ['district_id' => $id])->result_array();
	}

	public function delete($id = 0)
	{
		if (!empty($id)) {
			$this->db->select('id');
			$current_data = $this->db->get_where('user', ['id' => $id])->row_array();
			if(!empty($current_data)){
				if ($this->db->delete('user', ['id' => $id])) {
					return ['status' => 'success', 'msg' => 'Data has been deleted'];
				} else {
					return ['status' => 'error', 'msg' => 'Data failed to delete'];
				}
			}else{
				redirect(base_url('user/main'));
			}
		}
	}

	// start datatables
    var $column_order = array(null, 'username', 'email'); //set column field database for datatable orderable
    var $column_search = array('username', 'email'); //set column field database for datatable searchable
    var $order = array('username' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('id, username, email');
        $this->db->from('user');
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
        $this->db->from('user');
        return $this->db->count_all_results();
    }
    // end datatables
}