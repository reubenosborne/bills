<?php # controllers/deletebill.php

# Logic

$bill = new Bill();

$bill->load(Route::param('id'));

$bill->delete();

# Redirect

URL::redirect('/');