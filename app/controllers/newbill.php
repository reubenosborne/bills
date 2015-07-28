<?php # controllers/newbill.php

# Logic

Auth::kickout_non_admin('/');

if(Input::posted()){

	$bill = new Bill();

	$bill->fill(Input::all());
	$bill->date = date('Y-m-d H:i:s', strtotime('now'));
	$bill->splitcost = $bill->cost / 5;

	if ($_FILES) {
		$files = Upload::to_folder('assets/uploads/');

		if ($_FILES[0]['error_message'] == false) {
			$bill->image = $files[0]['filepath'];
		}
	}

	$bill->save();

	$users = new Users_Collection();
	$users->get();

	foreach ($users->items as $user) {

		$account = new Account();
		$account->user_id = $user->id;
		$account->bill_id = $bill->id;
		$account->save();

		if ($user->is_admin) {
			$email              = new Email();
			$email->to 	        = $user->email;
			$email->from        = 'Bills';
			$email->subject     = 'New Bill';
			$email->message     = 'There\'s a new bill to pay on the <a href="bills.reuben.osborne.yoobee.net.nz">Meola Bills</a> website.<br>Created on: '.$bill->date.'<br>Category: '.$bill->category.'<br>Price: $'.$bill->splitcost.'<br>Notes: '.$bill->notes;
			$email->html        = true;
			$email->send();
		}

	}

	URL::redirect('/admin');
}

$title = 'New Bill';

# Views

include VIEWS.'header.php';
include VIEWS.'bill_form.php';
include VIEWS.'footer.php';