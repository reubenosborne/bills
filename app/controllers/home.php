<?php # controllers/home.php

# Logic

$products = new Products_collection();

$products->where('deleted' , '0');
$products->order_by('name' , 'asc');
$products->get();


# Views

include VIEWS.'header.php';
include VIEWS.'products_grid.php';
include VIEWS.'footer.php';