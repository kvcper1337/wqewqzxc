
<?php if($this->session->flashdata('login_failed')) : ?>
	<p class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('registered')) : ?>
	<p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('registered'); ?></p>
<?php endif; ?>



<div class="container">
	<div class="row">
		<div class="col-sm-3 col-sm-offset-1">
			<div class="login-form">
				<?php $this->load->view('users/login'); ?>
			</div>
		</div>
		<div class="col-sm-4 col-sm-offset-2">
			<div class="signup-form"><!--sign up form-->
							<h2> Create new account </h2>
						<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
						<?php echo form_open('users/register'); ?>

						<p>
							<?php echo form_label('Login:'); ?>
							<?php
							$data = array(
									'name'        => 'username',
									'placeholder' => 'wpisz login',
									'value'       => set_value('usernamer')
								);
								?>
							<?php echo form_input($data); ?>
						</p>

						<p>
							<?php echo form_label('Email:'); ?>
							<?php
							$data = array(
									'name'        => 'email',
									'placeholder' => 'wpisz swoj mail',
									'value'       => set_value('email')
								);
								?>
								<?php echo form_input($data); ?>
						</p>


						<p>
							<?php echo form_label('Imie:'); ?>
							<?php
							$data = array(
									'name'        => 'firstname',
									'placeholder' => 'wpisz swoje imie',
									'value'       => set_value('firstname')
							);
								?>
								<?php echo form_input($data); ?>
						</p>


						<p>
							<?php echo form_label('Nazwisko:'); ?>
							<?php
							$data = array(
									'name'        => 'lastname',
									'placeholder' => 'wpisz swoje nazwisko',
									'value'     => set_value('lastname')
									);
									?>
								<?php echo form_input($data); ?>
						</p>

						<!--Field: Password-->
						<p>
							<?php echo form_label('Haslo:'); ?>
							<?php
							$data = array(
									'name'        => 'password',
									'placeholder' => 'wpisz haslo',
									'value' => set_value('password')
									);
									?>
									<?php echo form_password($data); ?>
						</p>

						<!--Field: Password2-->
						<p>
							<?php echo form_label('Potwierdz haslo:'); ?>
							<?php
							$data = array(
									'name'        => 'password2',
									'placeholder' => 'powtorz haslo',
										'value'  => set_value('password2')
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

			</div>
		</div>
	</div>
</div>

	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
