<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']    = 'home';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['contact']               = 'Home/contact';
$route['terms']                 = 'Home/terms';
$route['privacy']               = 'Home/privacy';

/** Authentication */
$route['register']              = 'authController/register';
$route['user/register']         = 'authController/register_user';

$route['verify']                = 'authController/verify';

$route['google-login']          = 'authController/google_login';
$route['auth/google_callback']  = 'authController/google_callback';


$route['login']                 = 'authController/login';
$route['logout']                = 'authController/logout';

$route['forgot-password']       = 'authController/forgot_password';
$route['reset-password']        = 'authController/reset_password';
$route['reset-password-submit'] = 'authController/reset_password_submit';


/** Admin Routes */
$route['admin']                 = 'AdminController/index';
$route['admin/dashboard']       = 'AdminController/dashboard';
$route['admin/settings']        = 'AdminController/generalSettings';
$route['admin/settings/update'] = 'AdminController/updateSettings';

$route['admin/password']        = 'AdminController/passwordChange';
$route['admin/password/update'] = 'AdminController/updatePassword';

/** users */
$route['admin/users']           = 'admin/Users/list';
$route['admin/users/add']       = 'admin/Users/addUser';
$route['admin/users/edit/(:num)'] = 'admin/Users/editUser/$1';
$route['admin/users/delete/(:num)'] = 'admin/Users/deleteUser/$1';

/** countries */
$route['admin/countries']          = 'admin/Countries/list';
$route['admin/countries/add']      = 'admin/Countries/addCountry';
$route['admin/countries/edit/(:num)'] = 'admin/Countries/editCountry/$1';
$route['admin/countries/delete/(:num)'] = 'admin/Countries/deleteCountry/$1';

/** countries price_wise_view*/
$route['admin/price_wise_view'] = 'admin/PriceWiseViewController/index';
$route['admin/price_wise_view/add'] = 'admin/PriceWiseViewController/addPriceWiseView';
$route['admin/price_wise_view/edit/(:num)'] = 'admin/PriceWiseViewController/editPriceWiseView/$1';
$route['admin/price_wise_view/delete/(:num)'] = 'admin/PriceWiseViewController/delete/$1';



/** user dashboard routes */
$route['user/dashboard']        = 'UserController/dashboard';
$route['user/mail_test']        = 'UserController/test_send_email';
$route['user/get_video_details'] = 'UserController/get_video_details';
$route['user/campaigns']        = 'UserController/all_campaigns';
$route['user/add-campaign']     = 'UserController/add_campaign';
$route['user/create-campaign']  = 'UserController/create_campaign';
$route['user/payments/(:num)'] = 'UserController/payments/$1';

$route['user/profile'] = 'UserController/profile';
$route['user/update_profile'] = 'UserController/update_profile';

$route['user/pay_with_paypal/(:num)'] = 'UserController/pay_with_paypal/$1';
$route['user/payment_success/(:num)'] = 'UserController/payment_success/$1';
$route['user/payment_failed/(:num)'] = 'UserController/payment_failed/$1';
$route['user/thank_you'] = 'UserController/thank_you';
$route['user/payment_error'] = 'UserController/payment_error';


$route['user/payment_history'] = 'UserController/payment_history';
