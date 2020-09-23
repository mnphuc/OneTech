<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	include 'global/connect.php';
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	if (empty($id)) {
		header('location:404.php');
	}
	?>
<title>Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
<script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
		<?php include 'layouts/header.php'; ?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Smartphones & Tablets</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<?php 
									$cats=mysqli_query($conn, "SELECT * FROM category WHERE status = 1 ");
									 ?>
									 <?php foreach ($cats as $c) :  ?>	
								<li><a href="category-product.php?id=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Apple</a></li>
								<li class="brand"><a href="#">Beoplay</a></li>
								<li class="brand"><a href="#">Google</a></li>
								<li class="brand"><a href="#">Meizu</a></li>
								<li class="brand"><a href="#">OnePlus</a></li>
								<li class="brand"><a href="#">Samsung</a></li>
								<li class="brand"><a href="#">Sony</a></li>
								<li class="brand"><a href="#">Xiaomi</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					<?php 
					$cat_id=isset($_GET['id']) ? $_GET['id'] : 0;
					$pro=mysqli_query($conn,"SELECT * FROM product WHERE status=1 AND category_id=$cat_id ORDER BY price ASC");
					$limit=20;
					$sql_total=mysqli_query($conn,"SELECT id FROM product WHERE status=1 AND category_id=$cat_id");
					$total=mysqli_num_rows($sql_total);
					$pages=ceil($total/$limit);
					$page=isset($_GET['page']) ? $_GET['page'] : 1;
					$start=($page-1)*$limit;
					?>
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?= $total ?></span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>
							<?php 
							foreach ($pro as $pr) : ?>	
							 
							<!-- Product Item -->
							<div class="product_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?>">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center">
									<a href="product.php?id=<?php echo $pr['id']; ?>" title=""><img src="images/<?php echo $pr['image']; ?>" alt=""></a>
								</div>
								<div class="product_content">
									<div class="product_price "><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
									<div class="product_name"><div><a href="product.php?id=<?php echo $pr['id']; ?>" tabindex="0"><?php echo $pr['name'] ?></a></div></div>	
								</div>

								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div>
						<?php endforeach; ?>
						</div>

						<!-- Shop Page Navigation -->

						<?php if ($pages>0) { ?>
						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-center">
						    <li class="page-item"><a class="page-link" href="?page=<?= ($page-1) ?>">Previous</a></li>
								<?php for ($p = 1; $p <= $pages ; $p++) { ?>				
						    <li class="page-item <?php if ($p==$page) { echo 'active'; } ?>"><a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a></li>
									<?php } ?>
						    <li class="page-item"><a class="page-link" href="?page=<?= ($page+1) ?>">Next</a></li>
						  </ul>
						</nav>
						<?php } ?>

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
							<?php 
							$pros=mysqli_query($conn,"SELECT * FROM product LIMIT 6");
							foreach ($pro as $pr) : ?>	
							<div class="owl-item">
								<div class="viewed_item <?php if ($pr['note']=="new") {echo 'is_new'; } else if ($pr['note']=="sale") {echo 'discount'; } ?> d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="uploads/<?php echo $pr['image']; ?>" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price"><?php if (empty($pr['sale_price'])): ?>
										$<?php echo $pr['price'] ?>
									<?php else: ?>
										$<?php echo $pr['sale_price']  ?><span>$<?php echo $pr['price'] ?></span>
									<?php endif ?></div>
										<div class="viewed_name"><a href="#"><?php echo $pr['name'] ?></a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
							<?php endforeach; ?>
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
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_8.jpg" alt=""></div></div>

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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/shop_custom.js"></script>
</body>

</html>