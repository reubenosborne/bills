<!-- Intro & Controls -->


<h1>Hello <?= $user->name ?></h1>

<a href="/new/bill" class="btn btn-primary">New Bill</a>

<a href="/logout" class="btn btn-danger">Logout</a>

<hr>


<!-- Unpaid Bills -->


<?php if ($bills->items): ?>

<h3>Unpaid Bills</h3>
	
<table class="table table-striped">

<tr>
	<th>File</th>
	<th>Recieved</th>
	<th>Category</th>
	<th>Total</th>
	<th>Split</th>
	<th>Notes</th>
	<th>User</th>
	<th>Edit</th>
	<th>Delete</th>
	<th>Pay</th>
</tr>

<?php foreach ($bills->items as $bill): ?>
		<tr>
			<!-- File -->
			<td width="50px">
				<?php if ($bill->image): ?>
					<a href="<?= $bill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>

			<!-- Date -->
			<td width="200px"><?= date('l d F', strtotime($bill->date)) ?></td>
			
			<!-- Category -->
			<td width="150px"><?= $bill->category ?></td>

			<!-- Total -->
			<td width="100px">
			<?php

			$db = new Database(Config::$database);

			$lastbill = $db
				->select('*')
				->from('bills')
				->where('category', $bill->category)
				->where('date <', $bill->date)
				->where('deleted', '0')
				->order_by([
					"date" => "desc",
					"id" => "desc"
				])
				->get_one();
			?>
		
			<?php if ($bill->cost > $lastbill['cost']): ?>

				<i class="glyphicon glyphicon-arrow-up"></i>

			<?php else: ?>

				<i class="glyphicon glyphicon-arrow-down"></i>

			<?php endif ?>

			$<?= $bill->cost ?>
			</td>
			
			<!-- Split Cost -->
			<td width="100px">$<?= $bill->splitcost ?></td>
			
			<!-- Notes -->
			<td width="50px"><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $bill->notes ?>"></i></td>
			
			<!-- Users -->
			<td width="100px">
				<?php $userspaid = getPaidUsers($bill->id) ?>
				<?php foreach ($userspaid as $up): ?>
					<span data-toggle="tooltip" data-placement="top"  title="<?= $up['name'] ?>"><i class="glyphicon glyphicon-user"></i></span>
				<?php endforeach ?>
			</td>
			
			<!-- Controls -->
			<td width="50px"><a href="<?= 'edit/bill/'.$bill->id ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a></td>
			<td width="50px"><a href="<?= 'delete/bill/'.$bill->id ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
			<td width="50px"><a href="<?= 'confirm/bill/'.$bill->id ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a></td>
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
	<th>Recieved</th>
	<th>Category</th>
	<th>Total</th>
	<th>Split</th>
	<th>Notes</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>

<?php foreach ($paidbills->items as $paidbill): ?>
		<tr>
			<!-- File -->
			<td width="50px">
				<?php if ($paidbill->image): ?>
					<a href="<?= $paidbill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>

			<!-- Date -->
			<td width="200px"><?= date('l d F', strtotime($paidbill->date)) ?></td>
			
			<!-- Category -->
			<td width="150px"><?= $paidbill->category ?></td>
			
			<!-- Total -->
			<?php

			$db = new Database(Config::$database);

			$paidlastbill = $db
				->select('*')
				->from('bills')
				->where('category', $paidbill->category)
				->where('date <', $paidbill->date)
				->where('deleted', '0')
				->order_by([
					"date" => "desc",
					"id" => "desc"
				])
				->get_one();
			?>

			<td width="100px">
			<?php if ($paidbill->cost > $paidlastbill['cost']): ?>

				<i class="glyphicon glyphicon-arrow-up"></i>

			<?php else: ?>

				<i class="glyphicon glyphicon-arrow-down"></i>

			<?php endif ?>

			$<?= $paidbill->cost ?>
			</td>

			<!-- Split Cost -->
			<td width="100px">$<?= $paidbill->splitcost ?></td>

			<!-- Notes -->
			<td width="50px"><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $paidbill->notes ?>"></i></td>
			
			<!-- Controls -->
			<td width="50px"><a href="<?= 'edit/bill/'.$paidbill->id ?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a></td>
			<td width="50px"><a href="<?= 'delete/bill/'.$paidbill->id ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
		</tr>

<?php endforeach ?>

</table>

<?php elseif ($bills->items && !$paidbills->items): ?>

	<p class="alert alert-danger">No bills have been paid yet.</p>

<?php else: ?>

	<p class="alert alert-info">There are no bills to pay.</p>

<?php endif ?>