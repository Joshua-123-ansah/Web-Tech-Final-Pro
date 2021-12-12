
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="./styles/account_creation.css" />
        <link rel="stylesheet" href="./styles/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="../js/product-add.js"></script>
		<title>Product Portal</title>
	</head>

	<?php
				$product_update_message="";
				$product_name = $_GET["name"];
				
				if(isset($_POST["update"])){
					require("../controls/product_controller.php");
					$quantity=$_POST["quantity"];

					$newUpdate=updateProductInfo($quantity,$product_name);
					if($newUpdate){
						$product_update_message='The product quantity has successfully been updated';
					}
				}
				
	?>

	<body>
		<nav class="nav-main">
            <h2><a href="./admin_dashboard.php">Home</a></h2>
            <h2><a href="./login.php">Log Out</a></h2>
        </nav>

        <div class="login-main">

			<div class="column col">
				<form action="" method="POST">
					
					<h3 class="mb-5">Product Portal</h3>
					<div class=text-success><?php echo $product_update_message?></div>
					<div class="mb-3">
						<label for="name" class="form-label">Name of item</label>
						<input
							type="text"
							class="form-control"
							id="name"
							value="<?php echo $product_name ?>"
							disabled
						/>
					</div>
					<div class="mb-3">
						<label for="number" class="form-label">Quantity</label>
						<input type="number" class="form-control" id="number" name="quantity"/>
					</div>
					<div class="login mb-3">
						<button type="submit" class="btn btn-primary m-1" name="update" onclick="updateProductData()">Update</button>
                        <button type="submit" class="btn btn-primary"><a href="./admin_view_for_remaining_product.php" style="text-decoration:none; color:white">Previous Page</a></button>
					</div>
				</form>
			</div>

            <div class="column login-wrapper">
				<div><img src="https://www.raprad.ie/uploads/aP0Yo2Ql/767x0_515x0/shutterstock_5178137021_236.jpg" alt="image"></div>
				<p><h1>ALEX STORE</h1></p>
			</div>
		</div>
		<footer class="footer-main p-2 d-flex justify-content-center ">
			Alex Store @2007
		</footer>
    </body> 