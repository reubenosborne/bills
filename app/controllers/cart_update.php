<?php # controllers/cart_update.php

# Logic

$quantity = Input::get('quantity');
$product_id = Route::param('id');

if ($quantity > 0) {
	Cart::set_quantity($product_id, $quantity);
}

# Views

URL::redirect(url('cart'));