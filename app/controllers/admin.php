<?php # controllers/admin.php

# Logic

Auth::kickout_non_admin('/');

# Views

include VIEWS.'header.php';
include VIEWS.'admin_panel.php';
include VIEWS.'footer.php';