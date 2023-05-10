<?php

require_once(__DIR__ . "/header.php");
require_once(__DIR__ . "/controllers/Cart.php");

if($cartItems <= 0)
{
	// Redirect to index
	header('Location: index.php');
}


$total = 0;

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

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping info</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" id="name" placeholder="Full Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" id="email" value="<?php echo $_COOKIE['user']; ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" id="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" id="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" id="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" id="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" id="phone" placeholder="Phone Number">
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes" id="notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php
								$subtotal = 0;
								foreach($cartList as $product)
								{
									$subtotal += $product['price'] * $product['quantity'];

									echo '
									<div class="order-col">
										<div>' . $product['quantity'] . 'x ' . $product['title'] . '</div>
										<div>RON ' . $product['price'] . '</div>
									</div>
									';
								}
								?>
							</div>
							<div class="order-col">
								<div>Shipping</div>

								<?php
								if($subtotal >= 500)
								{
									echo '<div><strong>FREE</strong></div>';
								}
								else
								{
									echo '<div><strong>RON 25</strong></div>';
								}
								?>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
							<?php
								if($subtotal >= 500)
								{
									$total = $subtotal;
									echo '<div><strong class="order-total">RON ' . $total . '</strong></div>';
								}
								else
								{
									$total = $subtotal + 25;
									echo '<div><strong class="order-total">RON ' . $total . '</strong></div>';
								}
								?>
							</div>
						</div>
						
						<?php
echo '<button class="primary-btn order-submit" onclick="PlaceOrder(' . htmlspecialchars(json_encode($total)) . ', ' . htmlspecialchars(json_encode(GetCartProductsJson($_COOKIE['user']))) . ')">Place order</button>';
?>

					</div>
					<!-- /Order Details -->
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
