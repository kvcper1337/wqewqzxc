
<?php echo form_open('users/login'); ?>
	<h2>Login to your account</h2>
	<p>
		<?php echo form_label('Login:')?>
		<?php
		$data = array(
			'name'        => 'username',
			'placeholder' => 'wpisz swoj login',
			'value'  => set_value('username')
		);
		?>
		<?php echo form_input($data); ?>
	</p>


	<p>
		<?php echo form_label('Haslo:');?>
		<?php
		$data = array(
			'name'        => 'password',
			'placeholder' => 'wpisz swoje haslo',
			'value'       => set_value('password')
		);
		?>
		<?php echo form_password($data); ?>
	</p>
<?php $data = array(
	'value' => 'zaloguj',
	'name' => 'submit',
	'class' => 'btn btn-primary'
); ?>
	<p>
		<?php echo form_submit($data); ?>
	</p>
<?php echo form_close(); ?>
