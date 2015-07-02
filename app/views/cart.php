<div class="container main">

	<h2>My Cart</h2>

	<hr>

	<table class="table table-striped">
		
		<tr>
			<th width="60">Image</th>
			<th width>Name</th>
			<th width="600">Description</th>
			<th width="50">Price</th>
			<th width="50">Quantity</th>
			<th width="50">Total</th>
			<th width="50">Delete</th>
		</tr>

		<? $total = 0; ?>

		<?php foreach (Cart::products() as $product): ?>
			
		<? $total += $product->quantity * $product->price; ?>	

		<tr>
			<td><img src="<?= $product->image ?>" alt="" width="50"></td>
			<td><?= $product->name ?></td>
			<td><?= $product->description ?></td>
			<td>$<?= $product->price ?></td>
			<td>
			<?= Form::open(url('cart/update/'.$product->id)) ?>
				<?= Form::number('quantity', $product->quantity) ?>
				<?= Form::submit('Set') ?>
			<?= Form::close() ?>
			</td>
			<td>$<?= $product->quantity * $product->price ?></td>
			<td><a href="<?= url('cart/remove/'.$product->id) ?>" class="btn btn-danger">Remove</a></td>
		</tr>

		<?php endforeach ?>

		<tr>
			<td colspan="5"></td>
			<td>$<?= $total ?></td>
			<td></td>
		</tr>

	</table>

	<h2>Total: $<?= $total ?></h2>

	<a href=" <?= url('cart/clear') ?> " class="btn btn-warning">Clear Cart</a>

</div>