<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['404_override'] = '';
$route['login/logout'] = 'users/logout';
$route['users/show/logout'] = 'users/logout';
$route['login/welcome'] = 'users/login';

//end of routes.php
