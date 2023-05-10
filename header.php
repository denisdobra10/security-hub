<?php

require_once(__DIR__ . "/controllers/Users.php");
require_once(__DIR__ . "/controllers/Cart.php");
require_once(__DIR__ . "/controllers/Wishlist.php");

$user = null;
$cartItems = 0;
$cartList = array();

$wishlistItems = 0;
$wishlistList = array();

// Check if user is logged in and store data about user
if(isset($_COOKIE['user']))
{
	$user = GetUserData($_COOKIE['user']);

	$cartItems = CountCartItems($user['id']);
	$cartList = GetCartItems($user['id']);

	$wishlistItems = CountWishlistItems($user['id']);
	$wishlistList = GetWishlistItems($user['id']);
}	

// Get the current working php script(page)
$current_page = basename($_SERVER['SCRIPT_NAME']);


?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    	<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +40745666777</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@stud.ubbcluj.ro</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> FSEGA, Cluj-Napoca</a></li>
					</ul>
					<ul class="header-links pull-right">
						<?php 
						// Check if user is logged in
						// display informations based on that
						if($user)
						{
							echo "<li><a>Welcome, " . $user['name'] . "!</a></li>";
							echo '<li><a id="logout-button" href="#"><i class="fa fa-user-o"></i> Logout</a></li>';

							// Check if user is administrator
							if($user['email'] == "admin@admin.admin")
							{
								echo '<li><a href="admin.php"><i class="fa fa-user-o"></i> Administrator</a></li>';
							}
						}
						else
						{
							echo "<li><a>Welcome, visitor!</a></li>";
							echo '<li><a href="login.php"><i class="fa fa-user-o"></i> Login</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="search.php" method="GET">
									<select class="input-select">
										<option value="0">All Categories</option>
									</select>
									<input class="input" name="keywords" placeholder="Search here">
									<button class="search-btn" type="submit">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<?php 
								// Check if user is logged in
								// wishlist and cart should be visible only if user is logged in
								if($user)
								{
									echo '<!-- Wishlist -->
									<div class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
											<i class="fa fa-heart-o"></i>
											<span>Your Wishlist</span>
											<div class="qty">' . $wishlistItems . '</div>
										</a>
										
									';

									if($wishlistItems > 0)
										{
											echo '
											<div class="cart-dropdown">
											<div class="cart-list">
											';
												foreach($wishlistList as $product)
												{
													echo '
													<div class="product-widget">
														<div class="product-img">
															<img src="./img/' . $product['image'] .'" alt="">
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="product-overview.php?id=' . $product['id'] .'">' . $product['title'] .'</a></h3>
															<h4 class="product-price"><span class="qty">' . $product['quantity'] .'x</span>RON ' . $product['price'] .'</h4>
														</div>
														<button class="delete" onclick="DeleteFromWishlist(' . $product['id'] .')"><i class="fa fa-close"></i></button>
													</div>
													';
												}
												
												echo '
												</div>
												
										</div>
									
												';

										}

									echo '</div>';

									echo '<!-- Cart -->
									<div class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
											<i class="fa fa-shopping-cart"></i>
											<span>Your Cart</span>
											<div class="qty">' . $cartItems . '</div>
										</a>';

										if($cartItems > 0)
										{
											echo '
											<div class="cart-dropdown">
											<div class="cart-list">
											';
												$subtotal = 0;
												foreach($cartList as $product)
												{
													$subtotal += $product['price'] * $product['quantity'];

													echo '
													<div class="product-widget">
														<div class="product-img">
															<img src="./img/' . $product['image'] .'" alt="">
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="product-overview.php?id=' . $product['id'] .'">' . $product['title'] .'</a></h3>
															<h4 class="product-price"><span class="qty">' . $product['quantity'] .'x</span>RON ' . $product['price'] .'</h4>
														</div>
														<button class="delete" onclick="DeleteFromCart(' . $product['id'] .')"><i class="fa fa-close"></i></button>
													</div>
													';
												}
												
												echo '
												</div>
												<div class="cart-summary">
													<small>' . $cartItems .' Item(s) selected</small>
													<h5>SUBTOTAL: RON ' . $subtotal .'</h5>
												</div>
												<div class="cart-btns">
													<a href="checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
												</div>
												
										</div>
									</div>
												';

										}
								}

								?>

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li <?php if ($current_page == 'index.php') { echo 'class="active"'; } ?>><a href="index.php">Home</a></li>
						<li <?php if ($current_page == 'hotcameras.php') { echo 'class="active"'; } ?>><a href="hotcameras.php">Just Arrived</a></li>
						<li <?php if ($current_page == 'wired.php') { echo 'class="active"'; } ?>><a href="wired.php">Wired Cameras</a></li>
						<li <?php if ($current_page == 'wireless.php') { echo 'class="active"'; } ?>><a href="wireless.php">Wireless Cameras</a></li>
						<li <?php if ($current_page == 'smart.php') { echo 'class="active"'; } ?>><a href="smart.php">Smart Cameras</a></li>
					</ul>

					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->


		<script src="js/products.js"></script>
		<script src="js/navbar.js"></script>
</body>
</html>