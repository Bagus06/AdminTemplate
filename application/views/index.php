<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ((empty($this->uri->rsegments[1])) || $this->uri->rsegments[1] == 'front') {
    $this->load->view('public/index');
}else{
    $this->user_model->check_login();
    $this->load->view('admin-lte/index');
}