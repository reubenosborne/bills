<h1>Admin</h1>
<a href="logout">Logout</a>

<?= Form::open() ?>
	
	<div class="form-group">
		<?= Form::label('bill', 'Bill') ?>
		<?= Form::text('bill', Sticky::get('bill')) ?>
	</div>
	
<?= Form::close() ?>	