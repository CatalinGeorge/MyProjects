<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'categories';
$route['view/(:any)'] = 'single/get/$1';
$route['category/(:any)'] = 'home/displaycategory/$1/0';
$route['category/(:any)/(:any)'] = 'home/displaycategory/$1/$2';
//$route['admin'] = 'admin/admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
