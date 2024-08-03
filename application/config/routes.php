<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']    = 'home';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

/** Authentication */
$route['register']              = 'authController/register';
$route['login']                 = 'authController/login';
$route['logout']                = 'authController/logout';

/** Admin Routes */
$route['admin']                 = 'AdminController/index';
$route['admin/dashboard']       = 'AdminController/dashboard';
$route['admin/settings']        = 'AdminController/generalSettings';
$route['admin/settings/update'] = 'AdminController/updateSettings';

$route['admin/password']        = 'AdminController/passwordChange';
$route['admin/password/update'] = 'AdminController/updatePassword';

/** user routes */
$route['user/dashboard']       = 'UserController/dashboard';
