<?php # controllers/newbill.php

# Logic

if(Input::posted()){

	$bill = new Bill();

	$bill->fill(Input::all());
	$bill->splitcost = $bill->cost / 5;

	if ($_FILES) {
		$files = Upload::to_folder('assets/uploads/');

		if ($_FILES[0]['error_message'] == false) {
			$bill->image = $files[0]['filepath'];
		}
	}

	$bill->save();

	URL::redirect('/admin');
}

$title = 'Add Bill';

# Views

include VIEWS.'header.php';
include VIEWS.'bill_form.php';
include VIEWS.'footer.php';