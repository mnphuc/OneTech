<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
		<?php include 'layouts/header.php'; ?>


	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<form action="process-cart.php" method="POST" accept-charset="utf-8">
							<!-- <input type="hidden" name="action" value="update"> -->
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<?php 
							$ghs=isset($_SESSION['cart']) ? $_SESSION['cart'] : []; ?>
							<?php if (count($ghs)==0): ?>
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<a href="shop.php" style="font-family: tahoma;">Bạn chưa có sản phẩm nào ! click vào đây để chọn sản phẩm</a>
								</div>
							<?php else: ?>
								<?php foreach ($ghs as $gh) : ?>
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="images/<?php echo $gh['image']; ?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><?php echo $gh['name']; ?></div>
										</div>
<!-- 										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div> -->
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
											<input type="number" name="quantity[]" id="quantity"  pattern="[1-10000]*" min="1" class="form-control" value="<?php echo $gh['quantity']; ?>" style="width: 60px;" onchange="enableBtn()" required>	
											<input type="hidden" name="id[]" value="<?php echo $gh['id']; ?>">
											
											</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">$<?php echo $gh['price']; ?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">$<?php echo $gh['quantity']*$gh['price']; ?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Option</div>
											<div class="cart_item_text">
												<a href="process-cart.php?id=<?php echo $gh['id']; ?>&action=delete" title="" class="btn btn-sm btn-danger">Del</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						<?php endforeach; ?>
							<?php endif ?>
						</div>

						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right"">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">$<?php echo tong_tien(); ?></div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="submit" class="btn btn-ligh btn-lg" disabled style="margin-right: 24px;" id="update"><i class="far fa-edit"></i> Update your cart</button>
							<a href="order.php"><button type="button" class="button cart_button_checkout" <?php if (count($ghs)==0) {echo 'disabled';} ?>><i class="fab fa-amazon-pay"></i>Apply Now</button></a>
						</div>						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

		<?php include 'layouts/footer.php'; ?>

	<!-- Copyright -->

	
</div>
<script>
function enableBtn() {
	document.getElementById("update").disabled = false;  
}
</script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/cart_custom.js"></script>
</body>

</html>