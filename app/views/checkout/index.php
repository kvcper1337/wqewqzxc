
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/price-range.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>js/html5shiv.js"></script>
	<script src="<?php echo base_url();?>js/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo base_url();?>images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<h1>CHECKOUT</h1>
<div class="checkout">
	<div class="row">
		<?php if(!empty($error_msg)){ ?>
			<div class="col-md-12">
				<div class="alert alert-danger"><?php echo $error_msg; ?></div>
			</div>
		<?php } ?>

		<div class="col-md-6 order-md-7 mb-1">
			<h4 class="d-flex justify-content-between align-items-center mb-3">
				<span class="text-muted">Your Cart</span>
				<span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items(); ?></span>
			</h4>
			<ul class="list-group mb-3">
				<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<img src="<?php echo base_url($item["image"]); ?>" width="95"/>
							<h6 class="my-0"><?php echo $item["name"]; ?></h6>
							<small class="text-muted"><?php echo '$'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
						</div>
						<span class="text-muted"><?php echo '$'.$item["subtotal"]; ?></span>
					</li>
				<?php } }else{ ?>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<p>No items in your cart...</p>
					</li>
				<?php } ?>
				<li class="list-group-item d-flex justify-content-between">
					<span>Total (USD)</span>
					<strong><?php echo '$'.$this->cart->total(); ?></strong>
				</li>
			</ul>
			<a href="<?php echo base_url('products/'); ?>" class="btn btn-block btn-info">Add Items</a>
		</div>
		<div class="col-md-5 order-md-1">
			<h4 class="mb-5"> <?php echo 'Witaj '.$this->session->userdata('username')?> </h4>
			<h4 class="mb-3">Contact Details</h4>
			<form method="post">
				<div class="mb-3">
					<label for="phone">city</label>
					<input type="text" class="form-control" name="city" value="<?php echo !empty($custData['city'])?$custData['city']:''; ?>" placeholder="enter ur city" required>
					<?php echo form_error('city','<p class="help-block error">','</p>'); ?>
				</div>
				<div class="mb-3">
					<label for="phone">zip-code</label>
					<input type="text" class="form-control" name="zip-code" value="<?php echo !empty($custData['zip-code'])?$custData['zip-code']:''; ?>" placeholder="enter ur zipcode" required>
					<?php echo form_error('zip-code','<p class="help-block error">','</p>'); ?>
				</div>
				<div class="mb-3">
					<label for="address">Address</label>
					<input type="text" class="form-control" name="adres" value="<?php echo !empty($custData['adres'])?$custData['adres']:''; ?>" placeholder="Enter address" required>
					<?php echo form_error('adres','<p class="help-block error">','</p>'); ?>
				</div>
				<input class="btn btn-success btn-lg btn-block" type="submit" name="placeOrder" value="Place Order">
			</form>
		</div>
	</div>
</div>
</body>
</html>
