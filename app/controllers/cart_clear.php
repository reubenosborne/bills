<?php # controllers/cart_clear.php

# Logic

Cart::clear_cart();

# Redirect

URL::redirect(url(''));