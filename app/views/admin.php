<div class="container main">
	
	<h2>Admin</h2>

	<hr>

<div class="flex flex-j-between flex-a-center">
	<h3>Edit Products</h3>
	
	<a href="<?=url('product/new')?>" class="btn btn-primary">Add Product</a>
</div>

<table class="table table-striped">
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Buttons</th>
	</tr>
	<?php foreach ($products->items as $product): ?>
		<tr>
			<td width="100">
				<?php if ($product->image): ?>
				<img src="<?= url($product->image) ?>" alt="" width="50">
				<?php endif ?>
			</td>
			<td><?= $product->name ?></td>
			<td><?= $product->description ?></td>
			<td>$<?= $product->price ?></td>
			<td width="140">
				<a href="<?= url('product/'.$product->id.'/edit')?>" class="btn btn-info">Edit</a>
				<a href="<?= url('product/'.$product->id.'/delete')?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>

</div>