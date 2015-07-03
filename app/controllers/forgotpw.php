<?php # controllers/forgot_pw.php

# Logic

if (Input::posted()) {

	$db = new Database(Config::$database);
	
	$user_id = $db
		->select('id')
		->from('users')
		->where('email', Input::get('email'))
		->get_field('id');

	$token              = new Token();

	$token->value       = md5(date('u'));

	$token->expiration  = date('Y-m-d H:i:s', strtotime('+1 second'));

	$token->user_id     = $user_id;

	$token->save();

	
	$email              = new Email();

	$email->to 	        = Input::get('email');

	$email->from        = 'Bills';

	$email->subject     = 'Reset Bills Password';
  
	$email->message     = 'Reset Link: <a href="http://bills.reuben.osborne.yoobee.net.nz/resetpw/'.$token->value.'">Click here to reset your password.</a>';
  
	$email->html        = true;
  
	$email->send();

	URL::redirect('/');

}

# Views

include VIEWS.'header.php';
include VIEWS.'forgotpw_form.php';
include VIEWS.'footer.php';