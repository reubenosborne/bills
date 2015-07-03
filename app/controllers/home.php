<?php # controllers/home.php

# Logic

if (!Auth::is_logged_in()) {
	URL::redirect('/login');
}

# Views

include VIEWS.'header.php';
include VIEWS.'user_panel.php';
include VIEWS.'footer.php';