<?php # controllers/login.php

# Logic

if (Input::posted()) {

	$user = new User();

	$user->fill(Input::all());

	$success = $user->authenticate();

	if ($success) {

		Auth::log_in($user->id, $user->is_admin);

		if (Auth::is_admin()) {
			URL::redirect('/admin');
		}else{
			URL::redirect('/');
		}

	}
}

# Views

include VIEWS.'header.php';
include VIEWS.'login_form.php';
include VIEWS.'footer.php';