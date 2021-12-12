
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
		<title>Admin</title>
	</head>

	<?php
				require("../controls/product_controller.php");
				
				$name_of_product=$quantity=$date=$producted_Added=$error="";
				if(isset($_POST['enter'])){
					$name_of_product=$_POST['name_of_product'];
					$quantity=$_POST['quantity'];
					$date=$_POST['date'];
					
					$productAdded=addProduct($name_of_product,$quantity,$date);
					if($productAdded){
						$producted_Added="Product has been added successfully";
					}else{
						$error="Product was not added";
					}
				}
				
	?>

	<body>
		<nav class="nav-main">
			<h2><a href="./admin_dashboard.php">Home</a></h2>
			<h2><a href="./login.php">Log Out</a></h2>
		</nav>

        <div class="login-main">
			<div class="column login-wrapper">
				<div><img src="https://www.raprad.ie/uploads/aP0Yo2Ql/767x0_515x0/shutterstock_5178137021_236.jpg" alt="image"></div>
				<p><h1>ALEX STORE</h1></p>
			</div>

			<div class="column col">
				<form method="POST" action="">
					<h3 class="mb-5">Product Addition Portal</h3>
					<div class=text-success><?php echo $producted_Added?></div>
                    <div class=text-danger><?php echo $error?></div>
					<div class="mb-3">
						<label for="name" class="form-label">Name of item</label>
						<input
							type="text"
							class="form-control"
							id="name"
							name="name_of_product"
							value="<?php echo $name_of_product; ?>""
						/>
					</div>
					<div class="mb-3">
						<label for="number" class="form-label">Quantity</label>
						<input type="number" class="form-control" id="number" name="quantity" value="<?php echo $quantity; ?>"/>
					</div>
					<div class="mb-3">
						<label for="number" class="form-label">Date Product was Purchased</label>
						<input type="date" class="form-control" id="number" name="date" value="<?php echo $date; ?>"/>
					</div>
					
					<div class="login mb-3">
						<button type="submit" class="btn btn-primary" name="enter">Enter</button>
					</div>
				</form>
			</div>
		</div>
		<footer class="footer-main p-2 d-flex justify-content-center ">
			Alex Store @2007
		</footer>
    </body> 