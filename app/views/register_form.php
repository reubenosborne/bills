<div class="container">

	<div class="login">
		<?= Form::open('', 'post', ['class' => 'col-md-4 col-md-offset-4']) ?>
	
		<h3>Register</h3>
		<a href="/login">Back to Login</a>
	
		<hr>
	
		<div class="form-group">
			<?=Form::label('name', 'Name')?>
			<?=Form::text('name', Sticky::get('name'), ['class' => 'form-control'])?>
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
		
</div>