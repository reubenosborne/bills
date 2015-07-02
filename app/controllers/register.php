<?php # controllers/register.php

# Logic

if (Input::posted()) {
	
	$user = new User();

	$user->fill(Input::all());

	$user->password = password_hash($user->password, PASSWORD_DEFAULT);

	$user->save();

	Auth::log_in($user->id);

	URL::redirect('/user');
}

# Views

include VIEWS.'header.php';
include VIEWS.'register_form.php';
include VIEWS.'footer.php';