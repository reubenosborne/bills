<?php # controllers/deletebill.php

# Logic

$bill = new Bill();

$bill->load(Route::param('id'));

$bill->delete();

// $accounts = new Accounts_Collection();
// $accounts->load(['bill_id' => $bill->id]);

$accounts = new Accounts_Collection();
$accounts->where('bill_id' , $bill->id);
$accounts->get();

foreach ($accounts->items as $account) {
	$account->delete();
}

# Redirect

URL::redirect('/admin');