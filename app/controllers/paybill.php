<?php # controllers/paybill.php

# Logic

$bill = new Bill();

$bill->load(Route::param('id'));

$bill->paid = '1';

// $accounts = new Accounts_Collection();
// $accounts->load(['bill_id' => '']);

// $accounts->delete();

# Redirect

URL::redirect('/admin');