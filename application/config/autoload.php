<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'form_validation');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'system', 'string', 'security', 'user');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('user/user_model');