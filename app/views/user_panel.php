<!-- 	Intro & Controls	 -->




<h1>Hello <?= $user->name ?></h1>

<?php if ( Auth::is_admin() ): ?>

	<a href="/admin" class="btn btn-primary">Admin</a>

<?php endif ?>

<a href="/logout" class="btn btn-danger">Logout</a>

<hr>




<!-- 	Unpaid Bills	 -->




<!-- If there are bills: -->

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
	
	<!-- Arrow Up/Down -->
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
	<td width="50px">
		<?php if ($bill->notes): ?>
			<i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $bill->notes ?>"></i>
		<?php endif ?>
	</td>
	
	<!-- Pay Bill -->
	<td width="50px"><a href="<?= 'pay/bill/'.$bill->id ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a></td>
</tr>

<?php endforeach ?>

<tr>
	<td colspan="3"></td>
	<td class="table-total">Total:</td>
	<td>$<?= $total ?></td>
	<td colspan="2"></td>
</tr>

</table>




<!-- If there are no bills: -->

<?php else: ?>

<p class="alert alert-success">No bills to pay, lucky you!</p>

<?php endif ?>




<!-- 	Pending Bills	 -->




<!-- If there are pending bills: -->

<?php if ($pendbills->items): ?>

<h3>Pending Bills</h3>

<!-- If there are pending bills and no bills to be paid -->

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
		<th>Total</th>
		<th>Split</th>
		<th>Notes</th>
	</tr>

<?php foreach ($pendbills->items as $pendbill): ?>

	<tr>
		<!-- File -->
		<td width="50px">
			<?php if ($pendbill->image): ?>
			<a href="<?= $pendbill->image ?>" alt=""><i class="glyphicon glyphicon-file"></i></a>
			<?php endif ?>
		</td>

		<!-- Date -->
		<td width="200px"><?= date('l d F', strtotime($pendbill->date)) ?></td>

		<!-- Category -->
		<td width="100px"><?= $pendbill->category ?></td>

		<!-- Total Cost -->
		<td width="100px">
		<?php

		$db = new Database(Config::$database);

		$pendlastbill = $db
			->select('*')
			->from('bills')
			->where('category', $pendbill->category)
			->where('date <', $pendbill->date)
			->where('deleted', '0')
			->order_by([
				"date" => "desc",
				"id" => "desc"
			])
			->get_one();
		?>
	
		<!-- Arrow Up/Down -->
		<?php if ($pendbill->cost > $pendlastbill['cost']): ?>

			<i class="glyphicon glyphicon-arrow-up"></i>

		<?php else: ?>

			<i class="glyphicon glyphicon-arrow-down"></i>

		<?php endif ?>

		$<?= $pendbill->cost ?>
		</td>

		<!-- Split Cost -->
		<td width="100px">$<?= $pendbill->splitcost ?></td>

		<!-- Notes -->
		<td width="50px">
			<?php if ($pendbill->notes): ?>
				<i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $pendbill->notes ?>"></i>
			<?php endif ?>
		</td>
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
	<th>Total</th>
	<th>Split</th>
	<th>Notes</th>
</tr>


<?php foreach ($paidbills->items as $paidbill): ?>

	<tr>
		<!-- File -->
		<td width="50px">
			<?php if ($paidbill->image): ?>
				<a href="<?= $paidbill->image ?>" alt=""><i class="glyphicon glyphicon-file"></i></a>
			<?php endif ?>
		</td>

		<!-- Date -->
		<td width="200px"><?= date('l d F', strtotime($paidbill->date)) ?></td>

		<!-- Category -->
		<td width="100px"><?= $paidbill->category ?></td>

		<!-- Total Cost -->
		<td width="100px">
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
	
		<!-- Arrow Up/Down -->
		<?php if ($paidbill->cost > $paidlastbill['cost']): ?>

			<i class="glyphicon glyphicon-arrow-up"></i>

		<?php else: ?>

			<i class="glyphicon glyphicon-arrow-down"></i>

		<?php endif ?>

		$<?= $paidbill->cost ?>
		</td>

		<!-- Splitcost -->
		<td width="100px">$<?= $paidbill->splitcost ?></td>

		<!-- Notes -->
		<td width="50px">
			<?php if ($paidbill->notes): ?>
				<i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="<?= $paidbill->notes ?>"></i>
			<?php endif ?>
		</td>
		
		</tr>
		
<?php endforeach ?>

</table>


<!-- If there are bills to be paid: -->

<? elseif ($bills->items): ?>


	<p class="alert alert-danger">Better get a move on, there are bills to be paid!</p>


<?php endif ?>