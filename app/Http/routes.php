<?php

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('login', 'UsersController@index');
Route::get('logout', 'UsersController@logout');
Route::post('post-register', 'UsersController@postRegister');
Route::post('post-login', 'UsersController@postLogin');

//ADMIN
Route::get('admin', 'backend\AdminController@index');

Route::get('admin/user', 'backend\AdminUserController@index');
Route::get('admin/user/create', 'backend\AdminUserController@create');
Route::post('admin/user/store', 'backend\AdminUserController@store');
Route::get('admin/user/show/{id}', 'backend\AdminUserController@show');
Route::get('admin/user/edit/{id}', 'backend\AdminUserController@edit');
Route::post('admin/user/update/{id}', 'backend\AdminUserController@update');
Route::post('admin/user/delete/{id}', 'backend\AdminUserController@delete');

// Admin Product
Route::get('admin/program', 'backend\AdminProgramController@index');
Route::get('admin/program/create', 'backend\AdminProgramController@create');
Route::post('admin/program/store', 'backend\AdminProgramController@store');
Route::post('admin/program/updateanggaran/{id}', 'backend\AdminProgramController@updateAnggaran');
Route::get('admin/program/show/{id}', 'backend\AdminProgramController@show');
Route::post('admin/program/edit/{id}', 'backend\AdminProgramController@edit');
Route::post('admin/program/update/{id}', 'backend\AdminProgramController@update');
Route::get('admin/program/delete/{id}', 'backend\AdminProgramController@delete');

// Kinerja
Route::get('admin/kinerja', 'backend\AdminKinerjaController@index');
Route::get('admin/kinerja/create', 'backend\AdminKinerjaController@create');
Route::post('admin/kinerja/store', 'backend\AdminKinerjaController@store');
Route::post('admin/kinerja/updateanggaran/{id}', 'backend\AdminKinerjaController@updateAnggaran');
Route::get('admin/kinerja/show/{id}', 'backend\AdminKinerjaController@show');
Route::get('admin/kinerja/edit/{id}', 'backend\AdminKinerjaController@edit');
Route::post('admin/kinerja/update/{id}', 'backend\AdminKinerjaController@update');
Route::post('admin/kinerja/delete/{id}', 'backend\AdminKinerjaController@delete');

// Kegiatan
Route::get('admin/kegiatan/{id}', 'backend\AdminKegiatanController@index');
Route::get('admin/kegiatan/detail/{id}', 'backend\AdminKegiatanController@detail');
Route::get('admin/kegiatan/create', 'backend\AdminKegiatanController@create');
Route::post('admin/kegiatan/store/{id}', 'backend\AdminKegiatanController@store');
Route::post('admin/kegiatan/updateanggaran/{id}', 'backend\AdminKegiatanController@updateAnggaran');
Route::get('admin/kegiatan/show/{id}', 'backend\AdminKegiatanController@show');
Route::post('admin/kegiatan/edit/{id}/{program}', 'backend\AdminKegiatanController@edit');
Route::post('admin/kegiatan/update/{id}', 'backend\AdminKegiatanController@update');
Route::get('admin/kegiatan/delete/{id}/{program}', 'backend\AdminKegiatanController@delete');

Route::get('admin/output/{id}', 'backend\AdminOutputController@index');
Route::post('admin/output/store/{id}', 'backend\AdminOutputController@store');
Route::post('admin/output/storesub/{id}', 'backend\AdminOutputController@storesub');
Route::post('admin/output/edit/{id}/{program}', 'backend\AdminOutputController@edit');
Route::get('admin/output/delete/{id}/{program}', 'backend\AdminOutputController@delete');
Route::post('admin/output/updatesub/{id}/{output}', 'backend\AdminOutputController@updatesub');
Route::get('admin/output/deletesub/{id}/{output}', 'backend\AdminOutputController@deletesub');

Route::get('admin/output/realisasi/{id}', 'backend\AdminOutputController@realisasi');
Route::post('admin/output/realisasi/storesub/{id}', 'backend\AdminOutputController@realisasistoresub');
Route::post('admin/output/realisasi/updatesub/{id}/{output}', 'backend\AdminOutputController@realisasiupdatesub');
Route::get('admin/output/realisasi/deletesub/{id}/{output}', 'backend\AdminOutputController@realisasideletesub');

Route::get('admin/berita', 'backend\AdminController@berita');