<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['lihat_semua'] = 'home/all_properti';
$route['detail/(:any)'] = 'home/detail_properti/$1';
$route['kesinibang'] = 'home/tambah_properti';
$route['tambah_data'] = 'home/tambah_data';
$route['upload'] = 'home/upload';
$route['survey'] = 'home/request_survey';
$route['isi_survey'] = 'home/data_survey';
$route['info_survey'] = 'home/info_survey';
$route['selesai_survey/(:any)'] = 'home/selesai_survey/$1';
$route['admin'] = 'home/admin';
$route['mau_masuk'] = 'home/cek_admin';
$route['D'] = 'home/destroy_any_session';
$route['home_admin'] = 'home/page_admin';
$route['search'] = 'home/search';
$route['terimakasih'] = 'home/terimakasih';
$route['cek'] = 'home/cek_sess';
$route['faq'] = 'home/faq';
$route['search'] = 'home/search';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
