<?php # controllers/logout.php

Auth::log_out();

URL::redirect(url(''));