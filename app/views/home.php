<div class="container">
	<h2>PRODUKTY</h2>
	<div class="row col-lg-12">
		<?php if(!empty($product)){
		foreach( $product as $row){ ?>
		<div class="card col-lg-3">
			<img class="card-img-top" src="<?php echo base_url($row['image']);?>" alt="">
			<div class="card-body">
				<h5 class="card-title"><?php echo $row['name']; ?></h5>
				<h6 class="card-subtitle mb-2 text-muted">Price: <?php echo '$'. $row['price']; ?></h6>
				<a href="<?php echo base_url('product/addtocart/'.$row['id']); ?>"class="btn btn-primary">Add to cart</a>
			</div>
		</div>
		<?php } } else { ?>
		<p>Produktu nie znaleziono</p>
		<?php } ?>


	</div>
</div>
