<!-- 	Intro & Controls	 -->





<h1>Hello <?= $user->name ?></h1>

<?php if ( Auth::is_admin() ): ?>

	<a href="/admin" class="btn btn-primary">Admin</a>

<?php endif ?>

<a href="/logout" class="btn btn-danger">Logout</a>

<hr>





<!-- 	Unpaid Bills	 -->





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
	<th>Paid</th>
</tr>

<?php foreach ($bills->items as $bill): ?>

<tr>
	<td>
		<?php if ($bill->image): ?>

		<a href="<?= $bill->image ?>" alt="" width="100"><i class="glyphicon glyphicon-file"></i></a>
		
		<?php endif ?>
	</td>
	<td><?= date('l d F', strtotime($bill->date)) ?></td>
	<td><?= $bill->category ?></td>
	<td>
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

	<td>$<?= $bill->splitcost ?></td>
	<td><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $bill->notes ?>"></i></td>
	<td><a href="<?= 'pay/bill/'.$bill->id ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a></td>
</tr>

<?php endforeach ?>

</table>



<?php else: ?>



<p class="alert alert-success">No bills to pay, lucky you!</p>



<?php endif ?>





<!-- 	Pending Bills	 -->





<?php if ($pendbills->items): ?>



<h3>Pending Bills</h3>

<?php if ($pendbills->items && !$bills->items): ?>

	<div class="alert alert-info alert-dismissible fade in" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <p>Awaiting confirmation. Thanks for paying all your bills!</p>
	</div>

<?php endif ?>

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
			<td width="50">
				<?php if ($pendbill->image): ?>
				<a href="<?= $pendbill->image ?>" alt=""><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>
			<td><?= date('l d F', strtotime($pendbill->date)) ?></td>
			<td><?= $pendbill->category ?></td>
			<td>$<?= $pendbill->splitcost ?></td>
			<td><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $pendbill->notes ?>"></i></td>
		</tr>
<?php endforeach ?>

</table>
<?php endif ?>





<!-- 	Paid Bills	 -->





<?php if ($paidbills->items): ?>


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
			<td width="50">
				<?php if ($paidbill->image): ?>
				<a href="<?= $paidbill->image ?>" alt=""><i class="glyphicon glyphicon-file"></i></a>
				<?php endif ?>
			</td>
			<td><?= date('l d F', strtotime($paidbill->date)) ?></td>
			<td><?= $paidbill->category ?></td>
			<td>$<?= $paidbill->splitcost ?></td>
			<td><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $paidbill->notes ?>"></i></td>
		</tr>
<?php endforeach ?>

</table>


<? elseif ($bills->items): ?>


	<p class="alert alert-danger">Better get a move on, there are bills to be paid!</p>


<?php endif ?>