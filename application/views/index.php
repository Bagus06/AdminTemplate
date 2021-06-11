<?php defined('BASEPATH') OR exit('No direct script access allowed');

$get_config = $this->db->get_where('config', ['title' => 'application'])->row_array();
if (!empty($get_config)) {
    $value = json_decode($get_config['value']);
    if ((@get_user()['username'] == 'developer') || (empty($value->status)) || ($value->status == 1)) {
        if ((empty($this->uri->rsegments[1])) || $this->uri->rsegments[1] == 'front') {
            $this->load->view('public/index');
        }else{
            $this->user_model->check_login();
            $this->load->view('admin-lte/index');
        }
    }elseif($value->status == 2){
        $this->load->view('mode/maintenance');
    }elseif($value->status == 3){
        $this->load->view('mode/shutdown');
    }
}