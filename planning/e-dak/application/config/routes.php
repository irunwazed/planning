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

$route['login'] = 'pelaporan/LoginController/login';
$route['cek-login'] = 'pelaporan/LoginController/cekLogin';
$route['logout'] = 'pelaporan/LoginController/logout';

$route['beranda'] = 'pelaporan/HomeController/beranda';
$route['beranda/(:num)'] = 'pelaporan/HomeController/beranda/$1';

$route['data/(:num)/pegawai'] = 'pelaporan/PegawaiController/view/$1';
$route['data/pegawai/page-(:num)'] = 'pelaporan/PegawaiController/getData/$1';
$route['data/pegawai/create'] = 'pelaporan/PegawaiController/action/create';
$route['data/pegawai/update'] = 'pelaporan/PegawaiController/action/update';
$route['data/pegawai/delete'] = 'pelaporan/PegawaiController/action/delete';
$route['data/pegawai/set-ppk'] = 'pelaporan/PegawaiController/action/setPpk';
$route['data/pegawai/delete-ppk'] = 'pelaporan/PegawaiController/action/deletePpk';

$route['data/(:num)/pengguna'] = 'pelaporan/UsersController/view/$1';
$route['data/pengguna/page-(:num)'] = 'pelaporan/UsersController/getData/$1';
$route['data/pengguna/create'] = 'pelaporan/UsersController/action/create';
$route['data/pengguna/update'] = 'pelaporan/UsersController/action/update';
$route['data/pengguna/delete'] = 'pelaporan/UsersController/action/delete';

$route['usulan/(:num)/bidang'] = 'pelaporan/BidangController/view/$1';
$route['usulan/bidang/page-(:num)'] = 'pelaporan/BidangController/getData/$1';
$route['usulan/bidang/create'] = 'pelaporan/BidangController/action/create';
$route['usulan/bidang/update'] = 'pelaporan/BidangController/action/update';
$route['usulan/bidang/delete'] = 'pelaporan/BidangController/action/delete';
$route['usulan/bidang/set-verifikasi-bidang'] = 'pelaporan/BidangController/action/setVerifikasi';
$route['usulan/bidang/set-verifikasi-bappeda'] = 'pelaporan/BidangController/action/setVerifikasiBappeda';
$route['usulan/bidang/set-ttd'] = 'pelaporan/BidangController/action/setTtd';


$route['usulan/(:num)/sub-bidang/(:any)'] = 'pelaporan/SubBidangController/view/$1/$2';
$route['usulan/sub-bidang/page-(:num)'] = 'pelaporan/SubBidangController/getData/$1';
$route['usulan/sub-bidang/create'] = 'pelaporan/SubBidangController/action/create';
$route['usulan/sub-bidang/update'] = 'pelaporan/SubBidangController/action/update';
$route['usulan/sub-bidang/delete'] = 'pelaporan/SubBidangController/action/delete';

$route['usulan/(:num)/kegiatan/(:any)'] = 'pelaporan/KegiatanController/view/$1/$2';
$route['usulan/kegiatan/page-(:num)'] = 'pelaporan/KegiatanController/getData/$1';
$route['usulan/kegiatan/create'] = 'pelaporan/KegiatanController/action/create';
$route['usulan/kegiatan/update'] = 'pelaporan/KegiatanController/action/update';
$route['usulan/kegiatan/delete'] = 'pelaporan/KegiatanController/action/delete';

$route['usulan/(:num)/kegiatan-penunjang/(:any)'] = 'pelaporan/KegiatanPenunjangController/view/$1/$2';
$route['usulan/kegiatan-penunjang/page-(:num)'] = 'pelaporan/KegiatanPenunjangController/getData/$1';
$route['usulan/kegiatan-penunjang/create'] = 'pelaporan/KegiatanPenunjangController/action/create';
$route['usulan/kegiatan-penunjang/update'] = 'pelaporan/KegiatanPenunjangController/action/update';
$route['usulan/kegiatan-penunjang/delete'] = 'pelaporan/KegiatanPenunjangController/action/delete';
$route['usulan/kegiatan-penunjang/triwulan'] = 'pelaporan/KegiatanPenunjangController/action/setTriwulan';

$route['usulan/(:num)/rincian/(:any)'] = 'pelaporan/RincianController/view/$1/$2';
$route['usulan/rincian/page-(:num)'] = 'pelaporan/RincianController/getData/$1';
$route['usulan/rincian/create'] = 'pelaporan/RincianController/action/create';
$route['usulan/rincian/update'] = 'pelaporan/RincianController/action/update';
$route['usulan/rincian/delete'] = 'pelaporan/RincianController/action/delete';

$route['usulan/(:num)/detail-rincian/(:any)'] = 'pelaporan/DetailRincianController/view/$1/$2';
$route['usulan/detail-rincian/page-(:num)'] = 'pelaporan/DetailRincianController/getData/$1';
$route['usulan/detail-rincian/create'] = 'pelaporan/DetailRincianController/action/create';
$route['usulan/detail-rincian/update'] = 'pelaporan/DetailRincianController/action/update';
$route['usulan/detail-rincian/delete'] = 'pelaporan/DetailRincianController/action/delete';

$route['usulan/detail-rincian/triwulan'] = 'pelaporan/DetailRincianController/action/setTriwulan';

$route['usulan/(:num)/sub-detail-rincian/(:any)'] = 'pelaporan/SubDetailRincianController/view/$1/$2';
$route['usulan/sub-detail-rincian/page-(:num)'] = 'pelaporan/SubDetailRincianController/getData/$1';
$route['usulan/sub-detail-rincian/create'] = 'pelaporan/SubDetailRincianController/action/create';
$route['usulan/sub-detail-rincian/update'] = 'pelaporan/SubDetailRincianController/action/update';
$route['usulan/sub-detail-rincian/delete'] = 'pelaporan/SubDetailRincianController/action/delete';

$route['usulan/(:num)/laporan'] = 'pelaporan/LaporanController/laporan/$1';
$route['usulan/laporan/save/(:any)'] = 'pelaporan/LaporanController/cetak2/$1';
// $route['usulan/laporan/save/(:any)'] = 'pelaporan/BidangController/cetak/$1';

$route['data/set-ppk'] = 'pelaporan/FungsiController/setPpk';

$route['data/(:num)/pendukung/satuan'] = 'pelaporan/SatuanController/view/$1';
$route['data/pendukung/satuan/page-(:num)'] = 'pelaporan/SatuanController/getData/$1';
$route['data/pendukung/satuan/create'] = 'pelaporan/SatuanController/action/create';
$route['data/pendukung/satuan/update'] = 'pelaporan/SatuanController/action/update';
$route['data/pendukung/satuan/delete'] = 'pelaporan/SatuanController/action/delete';


$route['data/get-bidang'] = 'pelaporan/DataController/getBidang';
$route['data/get-sub-bidang'] = 'pelaporan/DataController/getSubBidang';
$route['data/get-ppk'] = 'pelaporan/PegawaiController/getDataPpk';

$route['send/email'] = 'pelaporan/EmailController/sendEmail';

// $route['beranda'] = 'kemiskinan/HomeController/beranda';
// $route['entry'] = 'kemiskinan/EntryController/form';

// $route['data/cek/no-kk'] = 'kemiskinan/dataController/cekNoKK';
// $route['data/no-kk/tambah'] = 'kemiskinan/KKController/action/create';
// $route['data/keluarga/kepala/update'] = 'kemiskinan/KKController/action/updateKepala';
// $route['data/keluarga/indikator'] = 'kemiskinan/KKController/filter/indikator';

// $route['data/keluarga/program/terima/create'] = 'kemiskinan/ProgramController/action/program/create';
// $route['data/keluarga/program/terima/update'] = 'kemiskinan/ProgramController/action/program/update';
// $route['data/keluarga/program/hapus'] = 'kemiskinan/ProgramController/action/program/delete';
// $route['data/keluarga/program/ambil'] = 'kemiskinan/ProgramController/action/programSelect';

// $route['data/penduduk/tambah'] = 'kemiskinan/PendudukController/action/create';
// $route['data/penduduk/edit'] = 'kemiskinan/PendudukController/action/update';
// $route['data/penduduk/hapus'] = 'kemiskinan/PendudukController/action/delete';

// $route['pengaturan/pengguna'] = 'kemiskinan/UserController/view';
// $route['data/pengaturan/pengguna/page-(:num)'] = 'kemiskinan/UserController/getData/$1';
// $route['data/pengaturan/pengguna/create'] = 'kemiskinan/UserController/action/create';
// $route['data/pengaturan/pengguna/update'] = 'kemiskinan/UserController/action/update';
// $route['data/pengaturan/pengguna/delete'] = 'kemiskinan/UserController/action/delete';

// $route['pengaturan/keluarga'] = 'kemiskinan/KeluargaController/view';
// $route['data/pengaturan/keluarga/page-(:num)'] = 'kemiskinan/KeluargaController/getData/$1';
// $route['data/pengaturan/keluarga/create'] = 'kemiskinan/KeluargaController/action/create';
// $route['data/pengaturan/keluarga/update'] = 'kemiskinan/KeluargaController/action/update';
// $route['data/pengaturan/keluarga/delete'] = 'kemiskinan/KeluargaController/action/delete';

// $route['laporan/indikator'] = 'kemiskinan/LaporanController/indikator';
// $route['laporan/indikator/data'] = 'kemiskinan/LaporanController/selectIndikator';
// $route['laporan/indikator/save/(:any)'] = 'kemiskinan/LaporanController/selectIndikator/$1';

// $route['laporan/program'] = 'kemiskinan/LaporanController/program';
// $route['laporan/program/data'] = 'kemiskinan/LaporanController/selectProgram';
// $route['laporan/program/save/(:any)'] = 'kemiskinan/LaporanController/selectProgram/$1';

// $route['laporan/kesejahteraan'] = 'kemiskinan/LaporanController/kesejahteraan';
// $route['laporan/kesejahteraan/data'] = 'kemiskinan/LaporanController/selectKesejahteraan';
// $route['laporan/kesejahteraan/save/(:any)'] = 'kemiskinan/LaporanController/selectKesejahteraan/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
