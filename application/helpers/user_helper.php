<?php defined('BASEPATH') or exit('No direct script access allowed');

function get_user()
{
	$link = str_replace('/', '_', base_url());
	$user = $_SESSION[$link . '_logged_in'];
	return $user;
}

function get_profile()
{
	$CI =& get_instance();
	$link = str_replace('/', '_', base_url());
	$user = $_SESSION[$link . '_logged_in'];

	$profile = $CI->db->get_where('profile', ['user_id' => $user['id']])->row_array();
	return $profile;
}