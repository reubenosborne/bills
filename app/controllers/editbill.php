<?php # controllers/deletebill.php

# Logic

$bill = new Bill();

$bill->load(Route::param('id'));

if(Input::posted()){

	$bill->fill(Input::all());
	$bill->splitcost = $bill->cost / 5;

	if ($_FILES) {
		$files = Upload::to_folder('assets/uploads/');

		if ($files[0]['error_message'] == false) {
			$bill->image = $files[0]['filepath'];
		}
	}

	$bill->save();

	$users = new Users_Collection();
	$users->get();

	URL::redirect('/admin');
}

Sticky::set('date', 	$bill->date);
Sticky::set('category', $bill->category);
Sticky::set('cost', 	$bill->cost);
Sticky::set('notes', 	$bill->notes);
Sticky::set('image', 	$bill->image);

$title = 'Edit Bill';

# Views

include VIEWS.'header.php';
include VIEWS.'bill_form.php';
include VIEWS.'footer.php';