<div class="container main">

	<?= Form::open('', 'post', ['class' => 'col-md-4 col-md-offset-4']) ?>

	<h2>Login</h2>

	<hr>

	<div class="form-group">
		<?=Form::label('username', 'Username')?>
		<?=Form::text('username', Sticky::get('username'), ['class' => 'form-control'])?>
	</div>
	
	<div class="form-group">
		<?=Form::label('password', 'Password')?>
		<?=Form::password('password', '', ['class' => 'form-control'])?>
	</div>

	<div class="form-group">
		<?=Form::submit('Login', ['class' => 'btn btn-primary'])?>
	</div>

	<?= Form::close() ?>

</div>