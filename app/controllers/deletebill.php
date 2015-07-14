<?php # controllers/deletebill.php

# Logic

$bill = new Bill();

$bill->load(Route::param('id'));

$bill->delete();

$accounts = new Accounts_Collection();
$accounts->load(['bill_id' => $bill->id]);

foreach ($variable as $key => $value) {
	# code...
}

# Redirect

URL::redirect('/admin');