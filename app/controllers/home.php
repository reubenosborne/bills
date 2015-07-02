<?php # controllers/home.php

# Logic

if (Auth::is_logged_in()) {
	URL::redirect('/user');
}else{
	URL::redirect('/login');
}


# Views

include VIEWS.'header.php';

include VIEWS.'footer.php';