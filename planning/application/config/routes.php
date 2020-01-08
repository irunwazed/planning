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


$route['login'] = 'HomeController/login';
$route['login-cek'] = 'AdminController/login';
$route['logout'] = 'AdminController/logout';

$route['beranda'] = 'AdminController/beranda';
$route['rpjmd/kota'] = 'AdminController/kota';

$route['import'] = 'ImportController/viewImport';
$route['importRek'] = 'ImportController/importRek';


$route['rpjmd/penyusunan/misi'] = 'rpjmd/MisiController/view';
$route['rpjmd/penyusunan/misi/get-data'] = 'rpjmd/MisiController/getData';
$route['rpjmd/penyusunan/misi/create'] = 'rpjmd/MisiController/action/create';
$route['rpjmd/penyusunan/misi/update'] = 'rpjmd/MisiController/action/update';
$route['rpjmd/penyusunan/misi/delete'] = 'rpjmd/MisiController/action/delete';

$route['rpjmd/penyusunan/tujuan/get-data'] = 'rpjmd/TujuanController/getData';
$route['rpjmd/penyusunan/tujuan/create'] = 'rpjmd/TujuanController/action/create';
$route['rpjmd/penyusunan/tujuan/update'] = 'rpjmd/TujuanController/action/update';
$route['rpjmd/penyusunan/tujuan/delete'] = 'rpjmd/TujuanController/action/delete';
$route['rpjmd/penyusunan/tujuan/(:any)'] = 'rpjmd/TujuanController/view/$1';

$route['rpjmd/penyusunan/sasaran/get-data'] = 'rpjmd/SasaranController/getData';
$route['rpjmd/penyusunan/sasaran/create'] = 'rpjmd/SasaranController/action/create';
$route['rpjmd/penyusunan/sasaran/update'] = 'rpjmd/SasaranController/action/update';
$route['rpjmd/penyusunan/sasaran/delete'] = 'rpjmd/SasaranController/action/delete';
$route['rpjmd/penyusunan/sasaran/(:any)'] = 'rpjmd/SasaranController/view/$1';

$route['rpjmd/penyusunan/opd/get-data'] = 'rpjmd/OpdController/getData';
$route['rpjmd/penyusunan/opd/create'] = 'rpjmd/OpdController/action/create';
$route['rpjmd/penyusunan/opd/update'] = 'rpjmd/OpdController/action/update';
$route['rpjmd/penyusunan/opd/delete'] = 'rpjmd/OpdController/action/delete';
$route['rpjmd/penyusunan/opd/(:any)'] = 'rpjmd/OpdController/view/$1';

$route['rpjmd/penyusunan/program/get-data'] = 'rpjmd/ProgramController/getData';
$route['rpjmd/penyusunan/program/create'] = 'rpjmd/ProgramController/action/create';
$route['rpjmd/penyusunan/program/update'] = 'rpjmd/ProgramController/action/update';
$route['rpjmd/penyusunan/program/delete'] = 'rpjmd/ProgramController/action/delete';
$route['rpjmd/penyusunan/program/(:any)'] = 'rpjmd/ProgramController/view/$1';

$route['renstra/penyusunan/program/get-data'] = 'opd/ProgramController/getData';
$route['renstra/penyusunan/program/create'] = 'opd/ProgramController/action/create';
$route['renstra/penyusunan/program/update'] = 'opd/ProgramController/action/update';
$route['renstra/penyusunan/program/delete'] = 'opd/ProgramController/action/delete';
$route['renstra/penyusunan/program'] = 'opd/ProgramController/view/$1';

$route['renstra/penyusunan/kegiatan/get-data'] = 'opd/KegiatanController/getData';
$route['renstra/penyusunan/kegiatan/create'] = 'opd/KegiatanController/action/create';
$route['renstra/penyusunan/kegiatan/update'] = 'opd/KegiatanController/action/update';
$route['renstra/penyusunan/kegiatan/delete'] = 'opd/KegiatanController/action/delete';
$route['renstra/penyusunan/kegiatan/(:any)'] = 'opd/KegiatanController/view/$1';

$route['renstra/penyusunan/bulanan/get-data'] = 'opd/BulananController/getData';
$route['renstra/penyusunan/bulanan/create'] = 'opd/BulananController/action/create';
$route['renstra/penyusunan/bulanan/update'] = 'opd/BulananController/action/update';
$route['renstra/penyusunan/bulanan/delete'] = 'opd/BulananController/action/delete';
$route['renstra/penyusunan/bulanan/(:any)'] = 'opd/BulananController/view/$1';

$route['opd/penyusunan/lra/get-data'] = 'opd/Rek1Controller/getData';
$route['opd/penyusunan/lra/create'] = 'opd/Rek1Controller/action/create';
$route['opd/penyusunan/lra/update'] = 'opd/Rek1Controller/action/update';
$route['opd/penyusunan/lra/delete'] = 'opd/Rek1Controller/action/delete';
$route['opd/penyusunan/lra'] = 'opd/Rek1Controller/view';

$route['opd/penyusunan/lra/rek2/get-data'] = 'opd/Rek2Controller/getData';
$route['opd/penyusunan/lra/rek2/create'] = 'opd/Rek2Controller/action/create';
$route['opd/penyusunan/lra/rek2/update'] = 'opd/Rek2Controller/action/update';
$route['opd/penyusunan/lra/rek2/delete'] = 'opd/Rek2Controller/action/delete';
$route['opd/penyusunan/lra/rek2/(:any)'] = 'opd/Rek2Controller/view/$1';

$route['opd/penyusunan/lra/rek2-program/get-data'] = 'opd/Rek2ProgramController/getData';
$route['opd/penyusunan/lra/rek2-program/create'] = 'opd/Rek2ProgramController/action/create';
$route['opd/penyusunan/lra/rek2-program/update'] = 'opd/Rek2ProgramController/action/update';
$route['opd/penyusunan/lra/rek2-program/delete'] = 'opd/Rek2ProgramController/action/delete';
$route['opd/penyusunan/lra/rek2-program/(:any)'] = 'opd/Rek2ProgramController/view/$1';

$route['opd/penyusunan/lra/rek2-kegiatan/get-data'] = 'opd/Rek2KegiatanController/getData';
$route['opd/penyusunan/lra/rek2-kegiatan/create'] = 'opd/Rek2KegiatanController/action/create';
$route['opd/penyusunan/lra/rek2-kegiatan/update'] = 'opd/Rek2KegiatanController/action/update';
$route['opd/penyusunan/lra/rek2-kegiatan/delete'] = 'opd/Rek2KegiatanController/action/delete';
$route['opd/penyusunan/lra/rek2-kegiatan/(:any)'] = 'opd/Rek2KegiatanController/view/$1';

$route['opd/penyusunan/lra/rek3/get-data'] = 'opd/Rek3Controller/getData';
$route['opd/penyusunan/lra/rek3/create'] = 'opd/Rek3Controller/action/create';
$route['opd/penyusunan/lra/rek3/update'] = 'opd/Rek3Controller/action/update';
$route['opd/penyusunan/lra/rek3/delete'] = 'opd/Rek3Controller/action/delete';
$route['opd/penyusunan/lra/rek3/(:any)'] = 'opd/Rek3Controller/view/$1';

$route['opd/penyusunan/lra/rek4/get-data'] = 'opd/Rek4Controller/getData';
$route['opd/penyusunan/lra/rek4/create'] = 'opd/Rek4Controller/action/create';
$route['opd/penyusunan/lra/rek4/update'] = 'opd/Rek4Controller/action/update';
$route['opd/penyusunan/lra/rek4/delete'] = 'opd/Rek4Controller/action/delete';
$route['opd/penyusunan/lra/rek4/(:any)'] = 'opd/Rek4Controller/view/$1';

$route['opd/penyusunan/lra/rek5/get-data'] = 'opd/Rek5Controller/getData';
$route['opd/penyusunan/lra/rek5/create'] = 'opd/Rek5Controller/action/create';
$route['opd/penyusunan/lra/rek5/update'] = 'opd/Rek5Controller/action/update';
$route['opd/penyusunan/lra/rek5/delete'] = 'opd/Rek5Controller/action/delete';
$route['opd/penyusunan/lra/rek5/(:any)'] = 'opd/Rek5Controller/view/$1';


$route['laporan/rkpd'] = 'laporan/RkpdController/view';
$route['laporan/rkpd/save/(:any)'] = 'laporan/RkpdController/cetak/$1';

$route['pengaturan/data/satuan'] = 'data/SatuanController/view';
$route['pengaturan/data/satuan/get-data'] = 'data/SatuanController/getData';
$route['pengaturan/data/satuan/create'] = 'data/SatuanController/action/create';
$route['pengaturan/data/satuan/update'] = 'data/SatuanController/action/update';
$route['pengaturan/data/satuan/delete'] = 'data/SatuanController/action/delete';

$route['pengaturan/data/pengguna'] = 'data/PenggunaController/view';
$route['pengaturan/data/pengguna/get-data'] = 'data/PenggunaController/getData';
$route['pengaturan/data/pengguna/create'] = 'data/PenggunaController/action/create';
$route['pengaturan/data/pengguna/update'] = 'data/PenggunaController/action/update';
$route['pengaturan/data/pengguna/delete'] = 'data/PenggunaController/action/delete';

$route['status/view'] = 'status/StatController/index';
$route['status/get-data'] = 'status/StatController/getData';
$route['status/ubah-data'] = 'status/StatController/update';

$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
