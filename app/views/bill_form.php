<?= Form::open_upload('', ['class' => 'col-md-6 col-md-offset-3']) ?>

	<h2><?= $title ?></h2>
	
	<hr>
	
	<div class="form-group">
		<?= Form::label('date', 'Date') ?>
		<?= Form::date('date', Sticky::get('date'), ['class' => 'form-control']) ?>
	</div>
	
	<div class="form-group">
		<?= Form::label('category', 'Category') ?>
		<?= Form::select('category', ['Water' => 'Water', 'Power' => 'Power', 'Gas' => 'Gas', 'Internet' => 'Internet', 'Misc.' => 'Misc.',], Sticky::get('category'), ['class' => 'form-control']) ?>
	</div>
	
	<div class="form-group">
		<?= Form::label('cost', 'Cost') ?>
		<?= Form::number('cost', Sticky::get('cost'), ['class' => 'form-control', 'step' => '0.01']) ?>
	</div>
	
	<div class="form-group">
		<div>
			<? if (Sticky::get('image')): ?>
				<img src="assets/uploads/baby-duck.jpg" alt="" width="100" margin="10">
			<? endif ?>
		</div>
		<div>
			<?= Form::label('file', 'Image') ?>
			<?= Form::file() ?>
		</div>
	</div>
	
	<div class="form-group">
		<?= Form::label('notes', 'Notes') ?>
		<?= Form::text('notes', Sticky::get('notes'), ['class' => 'form-control'])?>
	</div>
	
	<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

<?= Form::close() ?>

<?= Sticky::get('image') ?>