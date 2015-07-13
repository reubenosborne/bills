<?php # controllers/reset_pw.php

# Logic

$token = new Token();

# load the token by the value in the url
$token->load(['value' => Route::param('value')]);

$today_dt = strtotime(date('Y-m-d H:i:s'));
$token_dt = strtotime($token->expiration);

if ($today_dt < $token_dt) {
	
	# create a new user
	$user = new User();
	
	# load the user with the id found in the token
	$user->load($token->user_id);

	# if the form was posted
	if (Input::posted()) {
	
		# set the users password to the new hash
		$user->password = password_hash(Input::get('password'), PASSWORD_DEFAULT);
	
		# and save it
		$user->save();
	
		# log that user in
		Auth::log_in($user->id, $user->is_admin);

		# hard delete the token
		$token->hard_delete();
	
		# Redirect wherever you want to go after that.
		if (Auth::is_admin()) {
			URL::redirect('/admin');
		}else{
			URL::redirect('/');
		}
	}
}

# Views

include VIEWS.'header.php';
include VIEWS.'resetpw_form.php';
include VIEWS.'footer.php';