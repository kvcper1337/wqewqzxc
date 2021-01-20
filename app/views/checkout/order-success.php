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
<h1>ORDER STATUS</h1>
<?php if(!empty($order)){ ?>
    <div class="col-md-12">
        <div class="alert alert-success">Your order has been placed successfully.</div>
    </div>

    <!-- Order status & shipping info -->
    <div class="row col-lg-12 ord-addr-info">
        <div class="hdr">Order Info</div>
        <p><b>Reference ID:</b> #<?php echo $order['id']; ?></p>
        <p><b>Total:</b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
        <p><b>Placed On:</b> <?php echo $order['created']; ?></p>
        <p><b>Buyer ID:</b> <?php echo $this->session->userdata('id'); ?></p>
        <p><b>Email:</b> <?php echo $order['email']; ?></p>

    </div>

    <!-- Order items -->
    <div class="row col-lg-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($order['items'])){
                    foreach($order['items'] as $item){
                ?>
                <tr>
                    <td>

                        <img src="<?php echo base_url($item["image"]); ?>" width="75"/>
                    </td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo '$'.$item["price"].' USD'; ?></td>
                    <td><?php echo $item["quantity"]; ?></td>
                    <td><?php echo '$'.$item["sub_total"].' USD'; ?></td>
                </tr>
                <?php }
                } ?>
            </tbody>

        </table>
    </div>
	<a href="<?php echo base_url();?>home/index">powrot na strone glowna</a>
<?php } else{ ?>
<div class="col-md-12">
    <div class="alert alert-danger">Your order submission failed.</div>
</div>

<?php } ?>
</body>
</html>
