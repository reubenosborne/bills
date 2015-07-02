<?php # controllers/create_product.php

# Logic

if(Input::posted()){

	$product = new Product();

	$product->fill(Input::all());

	if ($_FILES) {
		$files = Upload::to_folder('assets/uploads/');

		if ($_FILES[0]['error_message'] == false) {
			$product->image = $files[0]['filepath'];
		}
	}

	$product->save();

	URL::redirect(url('admin'));
}

$title = 'Add Product';

# Views

include VIEWS.'header.php';
include VIEWS.'product_form.php';
include VIEWS.'footer.php';