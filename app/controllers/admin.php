<?php # controllers/admin.php

# Logic

Auth::kickout_non_admin('/');

$user = new User();
$user->load(Auth::user_id());

$bills = new Bills_Collection();
$bills->where('deleted' , '0');
$bills->order_by('date' , 'asc');
$bills->get();

# Views

include VIEWS.'header.php';
include VIEWS.'admin_panel.php';
include VIEWS.'footer.php';