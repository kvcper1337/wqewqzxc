<h1>Register</h1>
<p>Please fill out the form below to create an account</p>
<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('users/register'); ?>

<p>
	<?php echo form_label('login:'); ?>
	<?php
	$data = array(
			'name'        => 'login',
			'value'       => set_value('login')
	);
	?>
	<?php echo form_input($data); ?>
</p>

<p>
	<?php echo form_label('email'); ?>
	<?php
	$data = array(
			'name'        => 'email',
			'value'       => set_value('email')
	);
	?>
	<?php echo form_input($data); ?>
</p>


<p>
	<?php echo form_label('imie:'); ?>
	<?php
	$data = array(
			'name'        => 'imie',
			'value'       => set_value('imie')
	);
	?>
	<?php echo form_input($data); ?>
</p>


<p>
	<?php echo form_label('nazwisko:'); ?>
	<?php
	$data = array(
			'name'        => 'nazwisko',
			'value'       => set_value('nazwisko')
	);
	?>
	<?php echo form_input($data); ?>
</p>

<!--Field: Password-->
<p>
	<?php echo form_label('password:'); ?>
	<?php
	$data = array(
			'name'        => 'password',
			'value'       => set_value('password')
	);
	?>
	<?php echo form_password($data); ?>
</p>

<!--Field: Password2-->
<p>
	<?php echo form_label('potwierdz haslo:'); ?>
	<?php
	$data = array(
			'name'        => 'password2',
			'value'       => set_value('password2')
	);
	?>
	<?php echo form_password($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Register",
		"name" => "submit",
		"class" => "btn btn-primary"); ?>
<p>
	<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
