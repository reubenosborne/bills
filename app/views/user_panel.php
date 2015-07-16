<h1>Hello <?= $user->name ?></h1>

<a href="/logout" class="btn btn-danger">Logout</a>

<hr>

<h3>Unpaid Bills</h3>

<table class="table table-striped">
<tr>
	<th>File</th>
	<th>Date</th>
	<th>Category</th>
	<th>Cost</th>
	<th>Notes</th>
	<th>Paid</th>
</tr>
<?php foreach ($bills->items as $bill): ?>
		<tr>
			<td width="100">
				<?php if ($bill->image): ?>
				<a href="<?= $bill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>
			<td><?= $bill->date ?></td>
			<td><?= $bill->category ?></td>
			<td>$<?= $bill->splitcost ?></td>
			<td><?= $bill->notes ?></td>
			<td>
<!-- 			<?= Form::open() ?>
				
					<div class="form-group">
						<?= Form::label('paid', 'Paid') ?>
						<?= Form::checkbox('paid', Sticky::get('paid'), false, ['class' => 'form-control']) ?>
					</div>

			<?= Form::close() ?> -->
			<a href="<?= 'pay/bill/'.$bill->id ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a>
			</td>
		</tr>
<?php endforeach ?>
</table>

<h3>Pending Bills</h3>

<table class="table table-striped">
<tr>
	<th>File</th>
	<th>Date</th>
	<th>Category</th>
	<th>Cost</th>
	<th>Notes</th>
</tr>

<?php foreach ($pendbills->items as $pendbill): ?>
		<tr>
			<td width="100">
				<?php if ($pendbill->image): ?>
				<a href="<?= $pendbill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>
			<td><?= $pendbill->date ?></td>
			<td><?= $pendbill->category ?></td>
			<td>$<?= $pendbill->splitcost ?></td>
			<td><?= $pendbill->notes ?></td>
			<td>
<!--  			<?= Form::open() ?>
				
					<div class="form-group">
						<?= Form::label('paid', 'Paid') ?>
						<?= Form::checkbox('paid', Sticky::get('paid'), false, ['class' => 'form-control']) ?>
					</div>

			<?= Form::close() ?> -->
			</td>
		</tr>
<?php endforeach ?>

</table>

<h3>Paid Bills</h3>

<table class="table table-striped">
<tr>
	<th>File</th>
	<th>Date</th>
	<th>Category</th>
	<th>Cost</th>
	<th>Notes</th>
</tr>

<?php foreach ($paidbills->items as $paidbill): ?>
		<tr>
			<td width="100">
				<?php if ($paidbill->image): ?>
				<a href="<?= $paidbill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>
			<td><?= $paidbill->date ?></td>
			<td><?= $paidbill->category ?></td>
			<td>$<?= $paidbill->splitcost ?></td>
			<td><?= $paidbill->notes ?></td>
			<td>
<!--  			<?= Form::open() ?>
				
					<div class="form-group">
						<?= Form::label('paid', 'Paid') ?>
						<?= Form::checkbox('paid', Sticky::get('paid'), false, ['class' => 'form-control']) ?>
					</div>

			<?= Form::close() ?> -->
			</td>
		</tr>
<?php endforeach ?>

</table>