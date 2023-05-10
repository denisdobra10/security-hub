<?php

require_once(__DIR__ . "/controllers/Products.php");

$products = GetProductsByCategory("Smart");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		 <title>Security Hub - Facultatea de Stiinte Economice si Gestiunea Afacerilor</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- INCLUDE HEADER -->
		<?php require_once(__DIR__ . "/header.php") ?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Smart Secure Your Home With Our Smart Cameras</h3>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row col-md-offset-3">

					<!-- STORE -->
					<div id="store" class="col-md-9">

						<!-- store products -->
						<div class="row">

						<?php
							// Display all products from database here
							if($products)
							{
								foreach($products as $product)
								{
									$oldPrice = number_format($product['price'] * 1.2, 2);

									echo '
										<div class="col-md-4 col-xs-6">
										<div class="product">
											<a href=product-overview.php?id=' . $product['id'] . '>
												<div class="product-img">
													<img src="./img/' . $product['image'] . '">
												</div>
											</a>
											<div class="product-body">
												<p class="product-category">' . $product['category'] . '</p>
												<h3 class="product-name">' . $product['title'] . '</h3>
												<h4 class="product-price">RON ' . $product['price'] . ' <del class="product-old-price">RON ' . $oldPrice .'</del></h4>
	
												<div class="product-btns">
													<button class="add-to-wishlist" onclick="AddToWishlist(' . $product['id'] . ')"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="AddToCart(' . $product['id'] . ')"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
									</div>

									<div class="clearfix visible-sm visible-xs"></div>

									';
								}
							}

							?>

							<div class="clearfix visible-sm visible-xs"></div>

							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
						</div>
						<!-- /store products -->

					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- INCLUDE NEWSLETTER -->
		<?php require_once(__DIR__ . "/newsletter.php") ?>

		<!-- INCLUDE FOOTER -->
		<?php require_once(__DIR__ . "/footer.php") ?>

		<script src="js/products.js"></script>
		
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
