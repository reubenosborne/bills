<h1>Hello</h1>

<a href="/logout">Logout</a>

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
			</td>
		</tr>
<?php endforeach ?>
</table>