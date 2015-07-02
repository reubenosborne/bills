<?php # controllers/edit_product.php

# Logic

$product = new Product();

$product->load(Route::param('id'));

if(Input::posted()){

	$product->fill(Input::all());

	if ($_FILES) {
		$files = Upload::to_folder('assets/uploads/');

		if ($files[0]['error_message'] == false) {
			$product->image = $files[0]['filepath'];
		}
	}

	$product->save();

	URL::redirect(url('admin'));
}

Sticky::set('name', $product->name);
Sticky::set('price', $product->price);
Sticky::set('description', $product->description);
Sticky::set('image', $product->image);

$title = 'Edit Product: '.$product->name;


# Views

include VIEWS.'header.php';
include VIEWS.'product_form.php';
include VIEWS.'footer.php';
