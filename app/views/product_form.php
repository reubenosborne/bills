<div class="container main">

	<?= Form::open_upload('', ['class' => 'col-md-6 col-md-offset-3']) ?>

		<h2><?= $title ?></h2>

		<hr>

		<div class="form-group">
			<?= Form::label('name', 'Name') ?>
			<?= Form::text('name', Sticky::get('name'), ['class' => 'form-control']) ?>
		</div>

		<div class="form-group">
			<?= Form::label('price', 'Price') ?>
			<?= Form::number('price', Sticky::get('price'), ['class' => 'form-control', 'step' => '0.01']) ?>
		</div>

		<div class="form-group">
			<div class="flex flex-a-center">
				<? if (Sticky::get('image')): ?>
					<img src="<?= url(Sticky::get('image')) ?>" alt="" width="100" margin="10">
				<? endif ?>
				
				<div>
					<?= Form::label('file', 'Image') ?>
					<?= Form::file() ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?= Form::label('description', 'Description') ?>
			<?= Form::text('description', Sticky::get('description'), ['class' => 'form-control'])?>
		</div>


		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

</div>