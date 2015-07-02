<div class="container main">

	<?= Form::open('', 'post', ['class' => 'col-md-4 col-md-offset-4']) ?>

	<h2>Register</h2>

	<hr>

	<div class="form-group">
		<?=Form::label('username', 'Username')?>
		<?=Form::text('username', Sticky::get('username'), ['class' => 'form-control'])?>
	</div>
	
	<div class="form-group">
		<?=Form::label('email', 'Email')?>
		<?=Form::text('email', Sticky::get('email'), ['class' => 'form-control'])?>
	</div>
	
	<div class="form-group">
		<?=Form::label('password', 'Password')?>
		<?=Form::password('password', '', ['class' => 'form-control'])?>
	</div>

	<div class="form-group">
		<?=Form::submit('Register', ['class' => 'btn btn-primary'])?>
	</div>

	<?= Form::close() ?>

</div>