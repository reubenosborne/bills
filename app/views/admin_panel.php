<h1>Hello <?= $user->name ?></h1>

<a href="/new/bill" class="btn btn-primary">New Bill</a>

<a href="/logout" class="btn btn-danger">Logout</a>

<hr>

<h3>Unpaid Bills</h3>

<?php if ($bills->items): ?>
	
<table class="table table-striped">
<tr>
	<th>File</th>
	<th>Recieved</th>
	<th>Category</th>
	<th>Total</th>
	<th>Split</th>
	<th><i class="glyphicon glyphicon-sort"></i></th>
	<th>Notes</th>
	<th>User</th>
	<th width="50px">Edit</th>
	<th width="50px">Delete</th>
	<th width="50px">Pay</th>
</tr>

<?php foreach ($bills->items as $bill): ?>
		<tr>
			<td width="100">
				<?php if ($bill->image): ?>
				<a href="<?= $bill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>
			<td><?= date('l d F', strtotime($bill->date)) ?></td>
			<td><?= $bill->category ?></td>
			<td>$<?= $bill->cost ?></td>
			<td>$<?= $bill->splitcost ?></td>
			<td>
			<?php 	$lastbill = new Bill();
					$lastbill->load($bill->id - 1); ?>
			<?php if ($bill->cost > $lastbill->cost): ?>
				<i class="glyphicon glyphicon-arrow-up"></i>
			<?php else: ?>
				<i class="glyphicon glyphicon-arrow-down"></i>
			<?php endif ?>
			</td>
			<td><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $bill->notes ?>"></i></td>
			<td>
				<?php $userspaid = getPaidUsers($bill->id) ?>
				<?php foreach ($userspaid as $up): ?>
					<span data-toggle="tooltip" data-placement="top"  title="<?= $up['name'] ?>"><i class="glyphicon glyphicon-user"></i></span>
				<?php endforeach ?>
			</td>
			<td><a href="<?= 'edit/bill/'.$bill->id ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a></td>
			<td><a href="<?= 'delete/bill/'.$bill->id ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
			<td><a href="<?= 'confirm/bill/'.$bill->id ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a></td>
		</tr>
<?php endforeach ?>

</table>


<?php elseif (!$bills->items && $paidbills->items): ?>

	<p class="alert alert-info">There are no bills to pay.</p>

<?php endif ?>


<!--      Paid Bills      -->


<?php if ($paidbills->items): ?>

<h3>Paid Bills</h3>

<table class="table table-striped">
<tr>
	<th>File</th>
	<th>Date</th>
	<th>Category</th>
	<th>Cost</th>
	<th>Notes</th>
	<th width="50px">Edit</th>
	<th width="50px">Delete</th>
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
			<td><a href="<?= 'edit/bill/'.$paidbill->id ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a></td>
			<td><a href="<?= 'delete/bill/'.$paidbill->id ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
		</tr>
<?php endforeach ?>

</table>

<?php elseif ($bills->items && !$paidbills->items): ?>

	<p class="alert alert-danger">No bills have been paid yet.</p>

<?php else: ?>

	<p class="alert alert-info">There are no bills to pay.</p>

<?php endif ?>