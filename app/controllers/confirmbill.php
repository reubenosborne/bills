<?php # controllers/confirmbill.php

# Logic

Auth::kickout_non_admin('/');

$bill = new Bill();

$bill->load(Route::param('id'));

$bill->paid = 1;
$bill->save();

$accounts = new Accounts_Collection();
$accounts->where('bill_id' , $bill->id);
$accounts->get();

foreach ($accounts->items as $account) {
	$account->paid = 1;
	$account->confirmed = 1;
	$account->save();
}

# Redirect

URL::redirect('/admin');