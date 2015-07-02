<?php # controllers/cart_add.php

# Logic

Cart::add_product(Route::param('id'), 1);

# Redirect

URL::redirect(url(''));