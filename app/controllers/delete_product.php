<?php # controllers/delete_product.php

# Logic

$product = new Product();

$product->load(Route::param('id'));

$product->delete();

# Redirect

URL::redirect(url('admin'));