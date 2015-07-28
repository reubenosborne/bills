<?php # controllers/user.php

# Logic

if (!Auth::is_logged_in()) {
	Auth::kickout('/login');
};

$user = new User();
$user->load(Auth::user_id());

## ------------------------------------------------------------------------

$unpaidaccounts = new Accounts_Collection();
$unpaidaccounts->where('paid', '0');
$unpaidaccounts->where('confirmed', '0');
$unpaidaccounts->where('deleted' , '0');
$unpaidaccounts->where('user_id', Auth::user()->id);
$unpaidaccounts->get();


$bills = new Bills_Collection();
$bills->where('deleted' , '0');
$bills->where('paid' , '0');

foreach($unpaidaccounts->items as $key => $ua){
	$bills->where('id', $ua->bill_id, true, $key != 0);
}

$bills->order_by('date' , 'asc');

if(count($unpaidaccounts->items)){
	$bills->get();
}

## ------------------------------------------------------------------------

$pendaccounts = new Accounts_Collection();
$pendaccounts->where('paid', '1');
$pendaccounts->where('confirmed', '0');
$pendaccounts->where('deleted' , '0');
$pendaccounts->where('user_id', Auth::user()->id);
$pendaccounts->get();

$pendbills = new Bills_Collection();
$pendbills->where('deleted' , '0');

foreach($pendaccounts->items as $key => $pa){
	$pendbills->where('id', $pa->bill_id, true, $key != 0);
}

$pendbills->order_by('date' , 'asc');

if(count($pendaccounts->items)){
	$pendbills->get();
}

## ------------------------------------------------------------------------

$paidbills = new Bills_Collection();
$paidbills->where('deleted' , '0');
$paidbills->where('paid' , '1');
$paidbills->order_by('date' , 'asc');
$paidbills->get();


# Views

include VIEWS.'header.php';
include VIEWS.'user_panel.php';
include VIEWS.'footer.php';