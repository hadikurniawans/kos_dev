<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['lihat_semua'] = 'home/all_properti';
$route['detail/(:any)'] = 'home/detail_properti/$1';
$route['kesinibang'] = 'home/tambah_properti';
$route['tambah_data'] = 'home/tambah_data';
$route['upload'] = 'home/upload';
$route['faq'] = 'home/faq';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
