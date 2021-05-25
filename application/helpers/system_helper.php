<?php defined('BASEPATH') OR exit('No direct script access allowed');
function application()
{
	$data = [];
	$data['name'] = 'Siente CMS';
	$data['version'] = '1.0.0';
	$data['dsc'] = 'Database alumni Kalam Fuhum';
	$data['logo'] = 'assets/images/logo/logo-fuhum.png';
	$data['background'] = 'assets/images/background/';
	return $data;
}
function encrypt($string = '')
{
	$key = '';
	if(!empty($string))
	{
		$key = password_hash($string, PASSWORD_DEFAULT);
	}
	return $key;
}

function decrypt($string = '', $current_key = '')
{
	$key = '';
	if(!empty($string) && !empty($current_key))
	{
		$key = password_verify($string, $current_key);
	}
	return $key;
}

function alphabet()
{
	$data = [];
	foreach (range('A', 'Z') as $char) {
		$data[] = $char;
	}
	return $data;
}
function output_json($array)
{
	$output = '{}';
	if (!empty($array))
	{
		if (is_object($array))
		{
			$array = (array)$array;
		}
		if (!is_array($array))
		{
			$output = $array;
		}else{
			if (defined('JSON_PRETTY_PRINT'))
			{
				$output = json_encode($array, JSON_PRETTY_PRINT);
			}else{
				$output = json_encode($array);
			}
		}
	}
	header('content-type: application/json; charset: UTF-8');
	header('cache-control: must-revalidate');
	header('expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
	echo $output;
	exit();
}

function am($parent, $child, $ext, $type)
{
	$ci =& get_instance();
	$data[] = 0;
	if (!empty($parent)) {
		if ($ci->uri->rsegments[1] == $parent) {
			$data['parent'] = 'active';
		}
	}
	if (!empty($child) && !empty($parent)) {
		if (($ci->uri->rsegments[1] == $parent) && ($ci->uri->rsegments[2] == $child)) {
			$data['child'] = 'active';
		}
	}
	if (!empty($ext)) {
		if ($ci->uri->rsegments[2] == $ext) {
			$data['ext'] = 'active';
		}
	}
	if(!empty($type)){
		if (!empty($type) && !empty($parent)) {
			if ($ci->uri->rsegments[1] == $parent) {
				$data['open'] = 'menu-open';
			}
		}
	}
	return $data;
}

function capital_letters($string)
{
	$str = $string;
	$str = ucfirst($str);
	$str = str_replace("_", " ", $str);
	return $str;
}