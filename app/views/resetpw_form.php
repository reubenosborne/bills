<div class="login">
	<?= Form::open('', 'post', ['class' => 'col-md-4 col-md-offset-4']) ?>

	<h3>Reset Password</h3>
	<a href="/login">Back to Login</a>

	<hr>

	<div class="form-group">
		<?=Form::label('password', 'Password')?>
		<?=Form::password('password', Sticky::get('password'), ['class' => 'form-control'])?>
	</div>

	<div class="form-group">
		<?=Form::submit('Send', ['class' => 'btn btn-primary'])?>
	</div>

	<?= Form::close() ?>
</div>

<?= $today_dt ?>
<br>
<?= $token_dt ?>