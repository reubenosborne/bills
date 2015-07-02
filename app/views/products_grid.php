<div class="container main">
	
	<div class="products-grid">
		
		<?php foreach ($products->items as $product): ?>

			<div class="products-item">
				<h2><?= $product->name ?></h2>
				<div class="product-image"><img src="<?= url($product->image) ?>"></div>
				<hr>
				<div class="product-controls">
					<h3>$<?= $product->price ?></h3>
					<a href="<?= url('cart/add/'.$product->id) ?>" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
				</div>
			</div>
			
		<?php endforeach ?>

	</div>

</div>