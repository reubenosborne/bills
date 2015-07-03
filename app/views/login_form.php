<div class="login">
	<?= Form::open('', 'post', ['class' => 'col-md-4 col-md-offset-4']) ?>

	<h3>Login <span class="grey">or</span> <a href="/register">Create an Account</a></h3>

	<hr>

	<div class="form-group">
		<?=Form::label('email', 'Email')?>
		<?=Form::text('email', Sticky::get('email'), ['class' => 'form-control'])?>
	</div>

	<div class="form-group">
		<?=Form::label('password', 'Password')?>
		<?=Form::password('password', '', ['class' => 'form-control'])?>
	</div>

	<div class="form-group">
		<a href="/forgotpw">Forgot password?</a>
	</div>

	<div class="form-group">
		<?=Form::submit('Login', ['class' => 'btn btn-primary'])?>
	</div>

	<?= Form::close() ?>
</div>