<?php defined('BASEPATH') or exit('No direct script access allowed');

function get_user()
{
	$link = str_replace('/', '_', base_url());
	$user = $_SESSION[$link . '_logged_in'];
	return $user;
}