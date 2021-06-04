<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']   = 'front/main';
$route['login']                = 'user/login';
$route['token_request']                = 'user/token_request';
$route['logout']               = 'user/logout';
$route['403']                  = 'errors/error403';
$route['404_override']         = 'errors/error404';
$route['translate_uri_dashes'] = FALSE;