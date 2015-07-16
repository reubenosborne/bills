<?php # controllers/paybill.php

# Logic

$account = new Account();
$account->load([
		'bill_id' => Route::param('id'),
		'user_id' => Auth::user()->id
	]);

if ($account->id) {
	$account->paid = 1;
	$account->save();
}

# Redirect

URL::redirect('/');