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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'landing';
$route['404_override'] = 'errorku';
$route['translate_uri_dashes'] = FALSE;

// AUTH
$route['register'] = 'auth/register';
$route['register-save'] = 'auth/register_save';
$route['login'] = 'auth/login';
$route['reset-password'] = 'auth/reset_password';
$route['reset'] = 'auth/reset';
$route['new-password'] = 'auth/new_password';
$route['re-confirm'] = 'auth/reconfirm';
$route['verification'] = 'auth/verification';



// User
$route['pembayaran'] = 'user/pembayaran';
$route['pembayaran-sukses'] = 'user/paysuccess';
$route['data-pendaftaran'] = 'user/datapendaftaran';
$route['upload-berkas'] = 'user/upload_berkas';
$route['upload-berkas-pascasarjana'] = 'user/upload_berkas_pascasarjana';
$route['deletektp/(:num)'] = 'user/delete_ktp/$1';
$route['deletekk/(:num)'] = 'user/delete_kk/$1';
$route['deleteakte_kelahiran/(:num)'] = 'user/delete_akte_kelahiran/$1';
$route['deleteijazah/(:num)'] = 'user/delete_ijazah/$1';
// $route['deletefoto/(:num)'] = 'user/delete_foto/$1';
$route['deleteun/(:num)'] = 'user/delete_un/$1';
$route['deleteijazah_d/(:num)'] = 'user/delete_ijazah_d1_d2_d3/$1';
$route['deletetranskrip_d/(:num)'] = 'user/delete_transkrip_nilai_d1_d2_d3/$1';
$route['deletesk_pindah/(:num)'] = 'user/delete_sk_pindah/$1';
$route['deletepersyaratan_lain/(:num)'] = 'user/delete_persyaratan_lain/$1';
// $route['deletefoto/(:num)'] = 'user/delete_foto/$1';
$route['deleteijazah_s1/(:num)'] = 'user/delete_ijazah_s1/$1';
$route['delete_transkrip_s1/(:num)'] = 'user/delete_transkrip_s1/$1';
$route['prosespendaftaran'] = 'user/input_pendaftaran';
$route['edit-data-pendaftaran'] = 'user/editdatapendaftaran';
$route['simpaneditpendaftaran'] = 'user/simpaneditpendaftaran';
$route['print-pendaftaran'] = 'user/printformpendaftaran';
$route['print-formdomisili'] = 'user/printformdomisili';
$route['print-formpernyataan'] = 'user/printformpernyataan';
$route['faqs'] = 'user/faqs';
$route['setting-profile'] = 'user/settingprofile';
$route['notifikasi'] = 'user/notifikasi';
$route['notifikasi/(:num)'] = 'user/notifikasi/$1';
$route['messages'] = 'user/message';





//ADMIN
$route['login/admin'] = 'login';
$route['authadmin'] = 'login/proses';
$route['pendaftaran'] = 'pendaftaran';
$route['pendaftaran-list'] = 'pendaftaran/list_pendaftaran';
$route['keuangan-list'] = 'pendaftaran/list_keuangan';
$route['pendaftaran-list-detail/(:num)'] = 'pendaftaran/detail_list_pendaftaran/$1';
$route['master-akun'] = 'pendaftaran/akun';
$route['pendaftaran-detail/(:num)'] = 'pendaftaran/detail/$1';
$route['statistik-detail/(:num)'] = 'pendaftaran/statistik/$1';
$route['print-laporan-pendaftaran'] = 'pendaftaran/printlaporanpendaftaran';
$route['print-laporan-keuangan'] = 'pendaftaran/printlaporankeuangan';
$route['form-pendaftaran/(:num)'] = 'pendaftaran/formpendaftaran/$1';
$route['invoice-pendaftaran/(:num)'] = 'pendaftaran/invoice/$1';
$route['laporan-pendaftaran'] = 'pendaftaran/laporanpendaftaran';
$route['laporan-keuangan'] = 'pendaftaran/laporankeuangan';
$route['setting-prodi'] = 'programstudi/index';
$route['setting-ta'] = 'ta/index';
$route['setting-app'] = 'settings/index';
$route['setting-norek'] = 'settings/norek';
$route['setting-bg-hero'] = 'settings/bghero';
$route['berita-pmb'] = 'berita/index';
$route['pesan-admin'] = 'inbox/index';
$route['detail-pesan/(:num)'] = 'inbox/chat/$1';
$route['admin-settings'] = 'admin/settings';
$route['user-manajemen'] = 'usermanajemen/index';
$route['konfirmasi-pembayaran'] = 'pendaftaran/konfirmasi_pembayaran';
$route['tambah-mhs'] = 'mhs/index';








// DASHBOARD

$route['prodi-detail/(:any)'] = 'landing/prodidetail/$1';
$route['berita-detail/(:any)'] = 'landing/beritadetail/$1';
$route['berita-pmb-list'] = 'landing/berita_list';
$route['berita-pmb-list/(:any)'] = 'landing/berita_list/$1';











