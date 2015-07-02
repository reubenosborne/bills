<?php # controllers/admin.php

# Logic

$products = new Products_collection();

$products->where('deleted' , '0');
$products->order_by('id' , 'asc');
$products->get();

# Views

include VIEWS.'header.php';
include VIEWS.'admin.php';
include VIEWS.'footer.php';
