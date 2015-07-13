<?php 

Route::get('/', CONTROLLERS.'home.php');

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
Route::post('/delete/bill/:id', CONTROLLERS.'deletebill.php');

// Route::get('/product/new', CONTROLLERS.'create_product.php');
// Route::post('/product/new', CONTROLLERS.'create_product.php');
// 
// Route::get('/product/:id/edit', CONTROLLERS.'edit_product.php');
// Route::post('/product/:id/edit', CONTROLLERS.'edit_product.php');
// 
// Route::get('/product/:id/delete', CONTROLLERS.'delete_product.php');
// 
// Route::get('/cart/add/:id', CONTROLLERS.'cart_add.php');
// Route::get('/cart/clear', CONTROLLERS.'cart_clear.php');
// Route::get('/cart/remove/:id', CONTROLLERS.'cart_remove.php');
// Route::post('/cart/update/:id', CONTROLLERS.'cart_update.php');
// Route::get('/cart', CONTROLLERS.'cart_view.php');







Route::fallback(VIEWS.'404.php');