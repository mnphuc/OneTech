<!DOCTYPE html>
<html lang="en">
<head>
<title>Order</title>
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
	<?php if (isset($_SESSION['login'])): ?>
		<?php 
		$ghs=isset($_SESSION['cart']) ? $_SESSION['cart'] : []; 
		if (isset($_POST['btn_pay'])) {
				$user_id=$u['id'];
				$name=$_POST['fullname'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$address=$_POST['address'];
				$pay=$_POST['payment'];
			//1. lưu vào order để lấy order id
				$queryOd=mysqli_query($conn,"INSERT INTO orders(user_id) VALUES ($user_id)");
				if ($queryOd) {
					$order_id=mysqli_insert_id($conn);
					mysqli_query($conn,"INSERT INTO receiver(user_id,order_id,name,email,phone,address,payment_method) VALUES($user_id,$order_id,'$name','$email','$phone','$address','$pay')");
					//2.duyệt giỏ hàng vào order_detail
				foreach ($ghs as $gh) {
					$product_id=$gh['id'];
					$quantity=$gh['quantity'];
					$price=$gh['price'];
					mysqli_query($conn,"INSERT INTO order_detail VALUES ($order_id,$product_id,$quantity,$price)");
				}
				// gửi mailll

				// xóa gió hàng
				unset($_SESSION['cart']);

				header('location:thanks.php');

				}


		}
		 ?>
		<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="cart_container">
						<form action="process-order.php" method="POST" accept-charset="utf-8">
							<!-- <input type="hidden" name="action" value="update"> -->
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
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
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
											<input type="number" name="quantity[]" id="input" class="form-control" value="<?php echo $gh['quantity']; ?>" min="1" style="width: 60px;" onchange="enableBtn()" required>	
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
												<a href="process-order.php?id=<?php echo $gh['id']; ?>&action=delete" title="" class="btn btn-sm btn-danger">Del</a>
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
							<button type="submit" class="btn btn-ligh btn-lg" disabled id="update"><i class="far fa-edit"></i> Update your cart</button>
						</div>						
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title cart_title">Infomatin Customer</h3>
						</div>
						<div class="panel-body" style="margin-top: 67px;">
							<form action="" method="POST" class="form-horizontal" role="form">
								<div class="form-group">
								    <label for="Email">Full name</label>
								    <input type="text" class="form-control"  name="fullname" value="<?= $u['name'] ?>">
								  </div>
								  <div class="form-group">
								    <label for="Email">Email</label>
								    <input type="email" class="form-control" id="" name="email" value="<?= $u['email'] ?>">
								    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Phone</label>
								    <input type="text" class="form-control" name="phone" value="<?= $u['phone'] ?>">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Adress</label>
								    <input type="text" class="form-control" name="address" value="<?= $u['address'] ?>">
								  </div>
								<div class="form-group">
								    <label>Paymens method</label>
										<select name="payment" class="custom-select" style="min-width: 200px;">
											<option >Choose</option>
											<option value="1">Payment on delivery</option>
											<option value="2">Ship cod</option>
										</select>
								  </div>
									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-2">
											<button type="submit" class="btn btn-primary" name="btn_pay">Submit</button>
										</div>
									</div>
							</form>
						</div>
					</div>
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