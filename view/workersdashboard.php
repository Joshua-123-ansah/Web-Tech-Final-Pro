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
		<link rel="stylesheet" href="./styles/workersdashboard.css" />
		<title>Users Dashboard</title>
	</head>
	<body>
		<nav class="nav-main">
			<h2><a href="">Home</a></h2>
			<h2><a href="./login.php">Log Out</a></h2>
		</nav>

		<main class="d-flex justify-content-center flex-column">
			<div class="mb-3">
				<h3 class="text-light d-flex justify-content-center">WELCOME TO THE DASHBOARD</h3>
			</div>

			<div class="d-flex justify-content-center">
				<div class="me-5">
					<img
						src="https://st2.depositphotos.com/1069046/5869/i/600/depositphotos_58699647-stock-photo-auto-parts.jpg"
						alt="img"
						class="wd-img"
					/>
				</div>
				<div class="wd-description">
					<div>
						<div>
							<p class="text-light mb-5">
								Alex store is a store that aims to provide affordable part to all individual. Alex
								<br />
								store deals in all car spare part. Be it Nissan, Toyota to mention a few. <br />
								As a worker note that you need to work with integrity and honesty. Awkward
								attitude will not be tolerated.
							</p>
						</div>
						<div>
							<button class="wd-button"><a href="all_goods_screen.php">Previous Stock</a></button>
							<button class="wd-button"><a href="sales.php">Selling Dashboard</a></button>
							<button class="wd-button"><a href="remaininggoods.php">Goods Currently In Stock</a></button>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer class="footer-main p-2 d-flex justify-content-center ">
			Alex Store @2007
		</footer>

		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"
		></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    --></body>
	
</html>
