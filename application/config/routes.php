<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth';
$route['kabkot-group-list'] = 'Kabkot_List';
$route['kabkot-group-list/detail/(:any)'] = 'Kabkot_List/detail/$1';
$route['kabkot-group-list/hapus/(:any)'] = 'Kabkot_List/deleted/$1';
$route['kabkot-group-list/sunting/(:any)'] = 'Kabkot_List/sunting/$1';
$route['kabkot-group-input'] = 'Kabkot_Input';
$route['access-point-input'] = 'Access_Point_Input';
$route['access-point-list'] = 'Access_Point_List';
$route['access-point-list/hapus/(:any)'] = 'Access_Point_List/deleted/$1';
$route['access-point-input/detail/(:any)'] = 'Access_Point_Input/detail/$1'; 
$route['access-point-list/sunting/(:any)'] = 'Access_Point_List/sunting/$1';
$route['access-point-input/import/excel'] = 'Access_Point_Input/form_import/$1';
$route['access-point-input/download'] = 'Access_Point_Input/download';
$route['slider-input'] = 'Slider_Input';
$route['slider-list'] = 'Slider_List';
$route['slider-list/detail/(:any)'] = 'Slider_List/detail/$1';
$route['slider-list/hapus/(:any)'] = 'Slider_List/deleted/$1';
$route['slider-list/sunting/(:any)'] = 'Slider_List/sunting/$1';
$route['user-web-list'] = 'User_Web_List';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
