<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="assets/components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>



	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">

			<div class="navbar-header">
				<a href="<?=url('')?>"><h1 class="navbar-brand">Bills</h1></a>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#links-collapse">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="links-collapse">
				<ul class="nav navbar-nav navbar-right">
				
				<li class="nav-button"><a href="<?=url('cart')?>" class=""><span class="glyphicon glyphicon-shopping-cart"></span> My Cart <span class="badge"><?= Cart::get_total() ?></span></a></li>
			
				<?php if (Auth::is_logged_in()): ?>
				<li class="nav-button"><a href="admin" class=""><span class="glyphicon glyphicon-user"></span> Admin</a></li>
				<li class="nav-button"><a href="logout" class=""><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				
				<?php else: ?>
				<li class="nav-button"><a href="login" class=""><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li class="nav-button"><a href="register" class=""><span class="glyphicon glyphicon-edit"></span> Register</a></li>
				<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>