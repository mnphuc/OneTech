<!DOCTYPE html>
<html lang="en">
<head>
<title>Order History</title>
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
		<?php if (isset($_SESSION['login'])): 
		$u_id=$_SESSION['login']['id'];
		$order_id=isset($_GET['id'])?$_GET['id']:0;
		$sql="SELECT dt.quantity,dt.price,p.name,p.image FROM order_detail dt JOIN product p ON dt.product_id=p.id WHERE dt.order_id=$order_id";
		$order_detail=mysqli_query($conn,$sql);
			



			 ?>
		<div class="cart_section">
		<div class="container">

				
					
						
							<!-- <input type="hidden" name="action" value="update"> -->
						<div class="cart_title">Order History</div>
						
								<?php foreach ($order_detail as $k=>$dt) : ?>
							<ul class="cart_list">
								<li class="cart_item clearfix">
									
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Numbered order</div>
											<div class="cart_item_text"><?php echo $k+1; ?></div>
										</div>
										
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Image</div>
											<div class="cart_item_text">
												<img src="images/<?php echo $dt['image'] ?>" width="70px">
											</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">$<?php echo $dt['name']?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">$<?php echo $dt['price']?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text"><?php echo $dt['quantity']?></div>
										</div>
										
										
									</div>
								</li>
							</ul>
						<?php endforeach; ?>
							
						

						
						<!-- Order Total -->						
					
					</div>
				</div>
				

		</div>
	</div>
	<?php else: ?>
		<div class="cart_section">
			<div class="container">
				<div class="col-md-10">
					<h3 style="font-family: tahoma;color: #0E8CE4;">You must log in before placing an order!</h3>
				</div>
			</div>
		</div>
	<?php endif ?>



	

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