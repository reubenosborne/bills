<?php # controllers/user.php

# Logic

if (Auth::is_admin()) {
	URL::redirect('/admin');
}

# Views

include VIEWS.'header.php';
include VIEWS.'user_panel.php';
include VIEWS.'footer.php';