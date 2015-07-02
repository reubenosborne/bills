<?php # controllers/cart_remove.php

# Logic

Cart::remove_product(Route::param('id'));

# Redirect

URL::redirect(url('cart'));