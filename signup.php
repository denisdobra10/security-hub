
<?php

// Check if user is already logged in
if(isset($_COOKIE['user']))
{
	// Redirect to index.php
	header("Location: index.php");
	exit();
}	

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
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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

	<!-- LOGIN FORM -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Create a new <strong>ACCOUNT</strong></p>
						<form id="signup-form">
                            <input class="input" type="text" placeholder="Enter Full Name" name="name" maxlength="100" required>
                            <br>
							<input class="input" type="email" placeholder="Enter Your Email" name="email" maxlength="100" required>
                            <br>
                            <input class="input" type="password" placeholder="Enter Your Password" name="password" maxlength="100" required>
                            <br><br>
							<button class="newsletter-btn" id="signup-button">Sign up</button>
                            <br><br>
                            Already have an account? Click <a href="login.php">here</a> to login!
						</form>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	
	<!-- INCLUDE NEWSLETTER -->
	<?php require_once(__DIR__ . "/newsletter.php") ?>

	<!-- INCLUDE FOOTER -->
	<?php require_once(__DIR__ . "/footer.php") ?>



	<script src="js/signup.js"></script>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>