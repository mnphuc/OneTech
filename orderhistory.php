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
<style type="text/css" media="screen">
	.cart_item_title{
		text-align: center;
	}
</style>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
		<?php include 'layouts/header.php'; ?>
	<!-- Cart -->
		<?php if (isset($_SESSION['login'])): 
		$u_id=$_SESSION['login']['id'];
		$sql="SELECT o.id,o.created_at,o.status,SUM(dt.price*dt.quantity) AS 'total' FROM orders o JOIN order_detail dt ON o.id=dt.order_id  WHERE o.user_id=$u_id GROUP BY o.id,o.created_at,o.status ";
		$orders=mysqli_query($conn,$sql);
			 ?>
		<div class="cart_section">
		<div class="container">
						<div class="cart_title">Order History</div>
								<?php foreach ($orders as $gh) : ?>
							<ul class="cart_list">
								<li class="cart_item clearfix">
									
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">ID</div>
											<div class="cart_item_text"><?php echo $gh['id']; ?></div>
										</div>
										
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Created_at</div>
											<div class="cart_item_text"><?php echo $gh['created_at']; ?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">$<?php echo $gh['total']?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Status</div>
											<div class="cart_item_text">
												 <?php if($gh['status']==1): ?>
                                        			<button class="btn btn-success">Đã phê duyệt</button>
			                                    <?php elseif($gh['status']==2): ?>
			                                        <button class="btn btn-primary">Đã giao hàng</button>
			                                    <?php else: ?>
			                                    	<button class="btn btn-danger">Chưa phê duyệt</button>
			                                    <?php endif; ?>
											</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text">
											<button class="btn btn-info"><a style="color: white;" href="history_detail.php?id=<?php echo $gh['id']; ?>" >Chi tiết</a></button>
											</div>
										</div>
									</div>
								</li>
							</ul>
						<?php endforeach; ?>
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