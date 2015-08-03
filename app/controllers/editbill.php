<?php # controllers/editbill.php

# Logic

Auth::kickout_non_admin('/');

$bill = new Bill();

$bill->load(Route::param('id'));

if(Input::posted()){

	$bill->fill(Input::all());
	$bill->splitcost = round(($bill->cost / 5), 2, PHP_ROUND_HALF_UP);

	if ($_FILES) {

		$files = Upload::to_folder('assets/uploads/');

		if ($files[0]['error_message'] == false) {
			$bill->image = $files[0]['filepath'];
		}
	}

	$bill->save();

	URL::redirect('/admin');
}

Sticky::set('category', $bill->category);
Sticky::set('cost', 	$bill->cost);
Sticky::set('notes', 	$bill->notes);

$title = 'Edit Bill';

# Views

include VIEWS.'header.php';
include VIEWS.'bill_form.php';
include VIEWS.'footer.php';