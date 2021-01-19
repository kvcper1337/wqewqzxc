
<script>
	function updatecartitems(obj, rowid){
		$.get("<?php echo base_url('cart/updateitemqty'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
			if(resp == 'ok'){
				location.reload();
			}else{
				alert('nie mozna zaktualizowac karty.');
			}
		});
	}


</script>

<div class="container">
	<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>


			<h1>SHOPPING CART</h1>
				<table class="table table-striped">
								<thead>
									<tr>
										<th width="10%"></th>
										<th width="30%">Produkt</th>
										<th width="15%">Cena</th>
										<th width="13%">Ilość</th>
										<th width="20%" class="text-right"> razem</th>
										<th width="12%"></th>
									</tr>
								</thead>
								<tbody>
									<?php if($this->cart->total_items() > 0){
										$cartitems = $this->cart->contents();;
										foreach($cartitems as $item){ ?>
										<tr>
											<td>
											<?php $imageURL = !empty($item["image"])?base_url().$item["image"]:base_url('images/x/'); ?>
											<img src="<?php echo $imageURL; ?>" width="50"/>
											</td>
											<td> <?php echo $item["name"]; ?></td>
											<td> <?php echo '$'.$item['price'] ?></td>
											<td>  <input type="number" class="form-control text-center" value="<?php echo $item["qty"];?>" onchange=""updatecartitem(this, <?php echo $item["rowid"]; ?> ></td>
											<td class="text-right"><?php echo '$'.$item["subtotal"]; ?></td>
											<td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeitem/'.$item["rowid"]); ?>':false;">X<i class="itrash"></i> </button> </td>
										</tr>
										<?php } }else{ ?>
										<tr><td colspan="6"><p>Your cart is empty.....</p></td>
										<?php } ?>
										<?php if($this->cart->total_items() > 0){ ?>
										<tr>
											<td><td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url()?>cart/removeall ':false;"><i class="itrash">X</i> </button> </td>
											<td></td>
											<td></td>
											<td><strong>Cart Total</strong></td>
											<td class="text-right"><strong><?php echo '$'.$this->cart->total().' USD'; ?></strong></td>
											<td></td>
										</tr>
										<?php } ?>
								</tbody>
			</table>
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<a href="<?php echo base_url();?>home/index" class="btn btn-block btn-dark">Continue shopping</a>
						</div>
						<div class="col-sm-12 col-md-6 text-right">

							<a href="<?php echo base_url();?>checkout/index" class="btn btn-lg btn-block btn-primary">CHECKOUT</a>

						</div>
					</div>

	</div>
</div>

