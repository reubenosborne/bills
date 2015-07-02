<?php 

Route::get('/', CONTROLLERS.'home.php');

Route::get('/register', CONTROLLERS.'register.php');
Route::post('/register', CONTROLLERS.'register.php');

Route::get('/logout', CONTROLLERS.'logout.php');

Route::get('/login', CONTROLLERS.'login.php');
Route::post('/login', CONTROLLERS.'login.php');

Route::get('/user', CONTROLLERS.'user.php');

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