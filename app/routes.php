<?php 

Route::get('/', CONTROLLERS.'user.php');

Route::get('/register', CONTROLLERS.'register.php');
Route::post('/register', CONTROLLERS.'register.php');

Route::get('/login', CONTROLLERS.'login.php');
Route::post('/login', CONTROLLERS.'login.php');

Route::get('/logout', CONTROLLERS.'logout.php');

Route::get('/forgotpw', CONTROLLERS.'forgotpw.php');
Route::post('/forgotpw', CONTROLLERS.'forgotpw.php');

Route::get('/resetpw/:value', CONTROLLERS.'resetpw.php');
Route::post('/resetpw/:value', CONTROLLERS.'resetpw.php');

Route::get('/user', CONTROLLERS.'user.php');

Route::get('/admin', CONTROLLERS.'admin.php');
Route::post('/admin', CONTROLLERS.'admin.php');

Route::get('/new/bill', CONTROLLERS.'newbill.php');
Route::post('/new/bill', CONTROLLERS.'newbill.php');

Route::get('/edit/bill/:id', CONTROLLERS.'editbill.php');
Route::post('/edit/bill/:id', CONTROLLERS.'editbill.php');

Route::get('/delete/bill/:id', CONTROLLERS.'deletebill.php');

Route::get('/pay/bill/:id', CONTROLLERS.'paybill.php');






Route::fallback(VIEWS.'404.php');