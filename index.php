<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<?php include 'layouts/header.php'; ?>
	
	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<?php 
				$pro=mysqli_query($conn,"SELECT * FROM product WHERE image like 'banner_product%'");
				$pr=mysqli_fetch_assoc($pro);
				 ?>	
				<div class="banner_product_image"><img src="images/<?= $pr['image'] ?>" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of smartphones</h1>
						<div class="banner_price"><span>$ <?= $pr['price'] ?></span>$<?= $pr['sale_price'] ?></div>
						<div class="banner_product_name"><?= $pr['name'] ?></div>
						<div class="button banner_button"><a href="process-cart.php?id=<?= $pr['id'] ?>">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
								<!-- Deals Item -->
								<?php 
								$sql  = "SELECT p.*,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id WHERE p.note LIKE 'deals' ";
								$products= mysqli_query($conn,$sql);
								$pro=mysqli_fetch_assoc($products);
								?>
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="images/deals.png" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#"><?php echo $pro['cat_name']; ?></a></div>
											<div class="deals_item_price_a ml-auto">$<?php echo $pro['price']; ?></div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name"><?php echo $pro['name']; ?></div>
											<div class="deals_item_price ml-auto">$<?php echo $pro['sale_price']; ?></div>
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>6</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Deals Item -->
								<!-- Deals Item -->
								

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
									<li>On Sale</li>
									<li>Best Rated</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
									<!-- Slider Item -->
									<?php 
									$pro=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%featured%'");
									foreach ($pro as $pr) : ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?php echo $pr['image']; ?>" alt=""></div>
											<div class="product_content">
												<div class="product_price <?php if ($pr['note']=="sale") {echo 'discount'; } ?> "><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
												<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>"><?php echo $pr['name'] ?></a></div></div>
												<div class="product_extras">
													<a href="process-cart.php?id=<?php echo $pr['id']; ?>"><button class="product_cart_button">Add to Cart</button></a>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php endforeach; ?>
								<?php 
									$pro=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%featured%'");
									foreach ($pro as $pr) : ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?php echo $pr['image']; ?>" alt=""></div>
											<div class="product_content">
												<div class="product_price"><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
												<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>"><?php echo $pr['name'] ?></a></div></div>
												<div class="product_extras">
													<a href="process-cart.php?id=<?php echo $pr['id']; ?>"><button class="product_cart_button">Add to Cart</button></a>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php endforeach; ?>
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel">
								<div class="featured_slider slider">
									<!-- Slider Item -->
									<?php 
									$pro=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%featured%'");
									foreach ($pro as $pr) : ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?php echo $pr['image']; ?>" alt=""></div>
											<div class="product_content">
												<div class="product_price"><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
												<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>"><?php echo $pr['name'] ?></a></div></div>
												<div class="product_extras">
													<a href="process-cart.php?id=<?php echo $pr['id']; ?>"><button class="product_cart_button">Add to Cart</button></a>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php endforeach; ?>
								<?php 
									$pro=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%featured%'");
									foreach ($pro as $pr) : ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?php echo $pr['image']; ?>" alt=""></div>
											<div class="product_content">
												<div class="product_price"><?php if (empty($pr['sale_price'])): ?>
													$<?php echo $pr['price'] ?>
												<?php else: ?>
													$<?php echo $pr['sale_price']  ?><strike>$<?php echo $pr['price'] ?></strike>
												<?php endif ?></div>
												<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>"><?php echo $pr['name'] ?></a></div></div>
												<div class="product_extras">
													<a href="process-cart.php?id=<?php echo $pr['id']; ?>"><button class="product_cart_button">Add to Cart</button></a>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php endforeach; ?>
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>
							

							<!-- Product Panel -->
							<div class="product_panel panel">
								<div class="featured_slider slider">
									<!-- Slider Item -->
									<?php 
									$pro=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%featured%'");
									foreach ($pro as $pr) : ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?php echo $pr['image']; ?>" alt=""></div>
											<div class="product_content">
												<div class="product_price"><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
												<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>"><?php echo $pr['name'] ?></a></div></div>
												<div class="product_extras">
													<a href="process-cart.php?id=<?php echo $pr['id']; ?>"><button class="product_cart_button">Add to Cart</button></a>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php endforeach; ?>
								<?php 
									$pro=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%featured%'");
									foreach ($pro as $pr) : ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?php echo $pr['image']; ?>" alt=""></div>
											<div class="product_content">
												<div class="product_price"><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
												<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>"><?php echo $pr['name'] ?></a></div></div>
												<div class="product_extras">
													<a href="process-cart.php?id=<?php echo $pr['id']; ?>"><button class="product_cart_button">Add to Cart</button></a>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php endforeach; ?>
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>
							

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Popular Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full catalog</a></div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							<?php 
							$pcats=mysqli_query($conn,"SELECT * FROM banner WHERE link_image LIKE 'popular%'");
							foreach ($pcats as $pc) :
							 ?>	
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/<?= $pc['link_image'] ?>" alt=""></div>
									<div class="popular_category_text"><?= $pc['name'] ?></div>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				<?php 
							$banner=mysqli_query($conn,"SELECT p.*,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id WHERE image like 'banner_2%' ORDER BY p.price DESC");
							foreach ($banner as $bn) : ?>	
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category"><?= $bn['cat_name'] ?></div>
										<div class="banner_2_title"><?= $bn['name'] ?></div>
										<div class="banner_2_text"><?= $bn['description'] ?></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/<?= $bn['image'] ?>" alt="" width="750" height="416"></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>

	<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot New Arrivals</div>
							<ul class="clearfix">
								<li class="active">Featured</li>
								<li>Audio & Video</li>
								<li>Laptops & Computers</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-9" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<?php 
									$new=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%new%' LIMIT 10");
									foreach ($new as $n) : ?>
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $n['image'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price"><?= $n['price'] ?></div>
													<div class="product_name"><div><a href="product.php?id=<?= $n['id'] ?>"><?= $n['name'] ?></a></div></div>
													<div class="product_extras">
														<a href="process-cart.php?id=<?= $n['id'] ?>"><button class="product_cart_button">Add to Cart</button></a>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php endforeach; ?>
									<?php 
									$new=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%new%' LIMIT 10");
									foreach ($new as $n) : ?>
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $n['image'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price"><?= $n['price'] ?></div>
													<div class="product_name"><div><a href="product.php?id=<?= $n['id'] ?>"><?= $n['name'] ?></a></div></div>
													<div class="product_extras">
														<a href="process-cart.php?id=<?= $n['id'] ?>"><button class="product_cart_button">Add to Cart</button></a>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php endforeach; ?>
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<?php 
									$new=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%new%' LIMIT 10");
									foreach ($new as $n) : ?>
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $n['image'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price"><?= $n['price'] ?></div>
													<div class="product_name"><div><a href="product.php?id=<?= $n['id'] ?>"><?= $n['name'] ?></a></div></div>
													<div class="product_extras">
														<a href="process-cart.php?id=<?= $n['id'] ?>"><button class="product_cart_button">Add to Cart</button></a>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php endforeach; ?>
									<?php 
									$new=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%new%' LIMIT 10");
									foreach ($new as $n) : ?>
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $n['image'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price"><?= $n['price'] ?></div>
													<div class="product_name"><div><a href="product.php?id=<?= $n['id'] ?>"><?= $n['name'] ?></a></div></div>
													<div class="product_extras">
														<a href="process-cart.php?id=<?= $n['id'] ?>"><button class="product_cart_button">Add to Cart</button></a>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php endforeach; ?>
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>
								
								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<?php 
									$new=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%new%' LIMIT 10");
									foreach ($new as $n) : ?>
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $n['image'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price"><?= $n['price'] ?></div>
													<div class="product_name"><div><a href="product.php?id=<?= $n['id'] ?>"><?= $n['name'] ?></a></div></div>
													<div class="product_extras">
														<a href="process-cart.php?id=<?= $n['id'] ?>"><button class="product_cart_button">Add to Cart</button></a>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php endforeach; ?>
									<?php 
									$new=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE '%new%' LIMIT 10");
									foreach ($new as $n) : ?>
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $n['image'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price"><?= $n['price'] ?></div>
													<div class="product_name"><div><a href="product.php?id=<?= $n['id'] ?>"><?= $n['name'] ?></a></div></div>
													<div class="product_extras">
														<a href="process-cart.php?id=<?= $n['id'] ?>"><button class="product_cart_button">Add to Cart</button></a>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php endforeach; ?>
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							</div>
								
							<div class="col-lg-3">
								<?php 
								$new_single=mysqli_query($conn,"SELECT * FROM product WHERE note='new_single'");
								$ns=mysqli_fetch_assoc($new_single);
								 ?>
								<div class="arrivals_single clearfix">
									<div class="d-flex flex-column align-items-center justify-content-center">
										<div class="arrivals_single_image"><img src="images/<?= $ns['image'] ?>" alt=""></div>
										<div class="arrivals_single_content">
											<div class="arrivals_single_name_container clearfix">
												<div class="arrivals_single_name"><a href="product.php?id=<?= $ns['id'] ?>"><?= $ns['name'] ?></a></div>
												<div class="arrivals_single_price text-right">$<?= $ns['price'] ?></div>
											</div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<a href="process-cart.php?id=<?= $ns['id'] ?>"><button class="arrivals_single_button">Add to Cart</button></a>
										</div>
										<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
										<ul class="arrivals_single_marks product_marks">
											<li class="arrivals_single_mark product_mark product_new">new</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot Best Sellers</div>
							<ul class="clearfix">
								<li class="active">Top 20</li>
								<li>Audio & Video</li>
								<li>Laptops & Computers</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">
									
								<!-- Best Sellers Item -->
								<?php 
								$best=mysqli_query($conn,"SELECT * FROM product WHERE image LIKE 'best%' LIMIT 6");
								foreach ($best as $b) :
								 ?>
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="images/<?= $b['image'] ?>" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.php?id=<?= $b['id'] ?>"><?= $b['name'] ?></a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount"><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>
									<?php endforeach; ?>
							</div>
						</div>	
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_1.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_2.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_3.png" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trends 2018</h2>
						<div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

							<!-- Trends Slider Item -->
							<?php 
								$trends=mysqli_query($conn,"SELECT p.*,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id WHERE image LIKE 'trends%'");
								foreach ($trends as $tr) :
								 ?>
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/<?= $tr['image'] ?>" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#"><?= $tr['cat_name'] ?></a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.php"><?= $tr['name'] ?></a></div>
											<div class="trends_price">$<?= $tr['price'] ?></div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>
						<?php endforeach ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Latest Reviews</h3>
						<div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							
							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_1.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_2.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_3.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225</div>
										<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_4.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_5.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_6.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$375</div>
										<div class="viewed_name"><a href="#">Speedlink...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							<?php 
							$brands=mysqli_query($conn,"SELECT * FROM banner WHERE link_image like 'brands%'");
							foreach ($brands as $br) :
							 ?>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/<?= $br['link_image'] ?>" alt=""></div></div>
							<?php endforeach; ?>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

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
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>