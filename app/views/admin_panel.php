<h1>Hello <?= $user->name ?></h1>

<a href="/new/bill" class="btn btn-primary">New Bill</a>

<a href="/logout" class="btn btn-danger">Logout</a>

<hr>

<table class="table table-striped">
<tr>
	<th>File</th>
	<th>Date</th>
	<th>Category</th>
	<th>Cost</th>
	<th>Notes</th>
	<th>Controls</th>
</tr>

<?php foreach ($bills->items as $bill): ?>
		<tr>
			<td width="100">
				<?php if ($bill->image): ?>
				<a href="<?= $bill->image ?>" alt="" width="100">File</a>
				<?php endif ?>
			</td>
			<td><?= $bill->date ?></td>
			<td><?= $bill->category ?></td>
			<td>$<?= $bill->splitcost ?></td>
			<td><?= $bill->notes ?></td>
			<td>
<!--  			<?= Form::open() ?>
				
					<div class="form-group">
						<?= Form::label('paid', 'Paid') ?>
						<?= Form::checkbox('paid', Sticky::get('paid'), false, ['class' => 'form-control']) ?>
					</div>

			<?= Form::close() ?> -->
			<div class="btn-group">
				<a href="<?= 'edit/bill/'.$bill->id ?>" class="btn btn-info">Edit</a>
				<a href="<?= 'pay/bill/'.$bill->id ?>" class="btn btn-success">Pay</a>
				<a href="<?= 'delete/bill/'.$bill->id ?>" class="btn btn-warning">Remove</a>

			</div>


			</td>
		</tr>
<?php endforeach ?>
</table>