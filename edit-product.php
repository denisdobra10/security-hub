<?php

require_once(__DIR__ . "/controllers/Products.php");

// Check if administrator is willing to edit a product
$productToEdit = array();

if($_GET['id'])
{
	$productToEdit = GetProductById($_GET['id']);
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

<!-- EDIT PRODUCT FORM -->
<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="container">
						<p>Edit <strong>PRODUCT</strong></p>
                        <form id="edit-product-form" enctype="multipart/form-data">
						<div class="form-group">
                            <label for="title">Product id:</label>
                            <input type="text" class="form-control" id="id" name="id" hidden readonly value="<?php echo $productToEdit['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $productToEdit['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Current image:</label>
                            <img src="img/<?php echo $productToEdit['image']; ?>" id="old_image" name="old_image" alt="" style="height: 100px; width: 100px;">
                        </div>
                        <div class="form-group">
                            <label for="image">New Image:</label>
                            <input type="file" class="form-control" id="new_image" name="new_image" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $productToEdit['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" value="<?php echo $productToEdit['price']; ?>">
                        </div>
						<div class="form-group">
							<label for="price">Category:</label>
							<select id="categoryDropdown" name="categoryDropdown">
								<?php
								switch($productToEdit['category'])
								{
									case "Wired":
										echo '
										<option value="Wired" selected>Wired</option>
										<option value="Wireless">Wireless</option>
										<option value="Smart">Smart</option>
										';
										break;
									case "Wireless":
										echo '
										<option value="Wired">Wired</option>
										<option value="Wireless" selected>Wireless</option>
										<option value="Smart">Smart</option>
										';
										break;
									case "Smart":
										echo '
										<option value="Wired">Wired</option>
										<option value="Wireless">Wireless</option>
										<option value="Smart" selected>Smart</option>
										';
										break;
									default:
										break;
								}
								?>
							</select>
						</div>
						
                        <button type="submit" class="btn btn-primary" id="edit-product-button">Edit product</button>
                        </form>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /EDIT PRODUCT -->


	<!-- INCLUDE FOOTER -->
	<?php require_once(__DIR__ . "/footer.php") ?>

	
	<script src="js/admin.js"></script>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>