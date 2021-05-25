<?php defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_model
{
	private function _uploadLogo()
    {
        $filename = 'app-logo';
        $config['upload_path']          = './assets/images/logo';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $filename;
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        //$config['min_width']            = 1920;
        //$config['min_height']           = 1128;
        //$config['max_width']            = 1920;
        //$config['max_height']           = 1128;

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		
        if ($this->upload->do_upload('logo')) {
			$uploadedImage = $this->upload->data();
			if ($uploadedImage['file_size'] > 1024) {
				$resizeTo = 0;
				$resizeTo = $uploadedImage['file_size'] / 1000;
				$resizeTo = $uploadedImage['image_width'] / ceil($resizeTo);
				$source_path = './assets/images/logo/' . $uploadedImage['file_name'];
				$target_path = './assets/images/logo/';
				$config_manip = array(
					'image_library' => 'gd2',
					'source_image' => $source_path,
					'new_image' => $target_path,
					'maintain_ratio' => TRUE,
					'width' => ceil($resizeTo),
					'rotation_angle' => 90,
				);
				$this->load->library('image_lib', $config_manip);
				$this->image_lib->resize();
				$this->image_lib->rotate();
				$this->image_lib->clear();
			}
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

	private function _uploadBackground()
	{
		$filename = 'app-background';
		$config['upload_path']          = './assets/images/background';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		// $config['max_size']             = 1024; // 1MB
		//$config['min_width']            = 1920;
		//$config['min_height']           = 1128;
		//$config['max_width']            = 1920;
		//$config['max_height']           = 1128;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('background')) {
			$uploadedImage = $this->upload->data();
			if ($uploadedImage['file_size'] > 1024) {
				$resizeTo = 0;
				$resizeTo = $uploadedImage['file_size'] / 1000;
				$resizeTo = $uploadedImage['image_width'] / ceil($resizeTo);
				$source_path = './assets/images/background/' . $uploadedImage['file_name'];
				$target_path = './assets/images/background/';
				$config_manip = array(
					'image_library' => 'gd2',
					'source_image' => $source_path,
					'new_image' => $target_path,
					'maintain_ratio' => TRUE,
					'width' => ceil($resizeTo),
					'rotation_angle' => 90,
				);
			
				$this->load->library('image_lib', $config_manip);
				$this->image_lib->resize();
				$this->image_lib->rotate();
				$this->image_lib->clear();
			}
			return $this->upload->data("file_name");
		}
		return "default.jpg";
	}
	
	private function _deleteLogo($image_name)
    {
        if ($image_name != "default.jpg") {
            $filename = explode(".", $image_name)[0];
            return array_map('unlink', glob(FCPATH . "/assets/images/logo/$filename.*"));
        }
    }

	
	private function _deleteBackground($image_name)
    {
        if ($image_name != "default.jpg") {
            $filename = explode(".", $image_name)[0];
            return array_map('unlink', glob(FCPATH . "/assets/images/background/$filename.*"));
        }
    }

	public function all()
	{
		return $this->db->get('config')->result_array();
	}

	public function save($id)
	{
		$msg = [];
		if (!empty($id)) {
			$id = decrypt_url($id);
		}

		if (!empty($this->input->post())) {
			$data = $this->input->post();
			$input = [
				'title' => @$data['title'],
				'desc' => @$data['desc'],
				'logo' => @$this->_uploadLogo(),
				'background' => @$this->_uploadBackground()
			];
			$input = json_encode($input);

			if (!empty($id)) {
				$this->db->set(['value' => $input]);
				$this->db->where('title', $id);
				if ($this->db->update('config')) {
					$msg = ['status' => 'success', 'msg' => 'Data saved successfully'];
				}else{
					$msg = ['status' => 'error', 'msg' => 'The data you entered already exists'];
				}
			}
		}
		return $msg;
	}
}