
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
        <script src="https://kit.fontawesome.com/0594667512.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="./styles/account_creation.css" />
        <link rel="stylesheet" href="./styles/all_good_screen.css" />
		<title>Admin</title>
	</head>
    <?php
        require("../controls/post_controller.php");
        $allProducts=getAllProducts();
    ?>
	<body>
        <nav class="nav-main">
			<h2><a href="./admin_dashboard.php">Home</a></h2>
			<h2><a href="./login.php">Log Out</a></h2>
		</nav>


        <main style="height:93%" class="mt-3">
            <div class="container">
                <?php
                foreach($allProducts as $product){
                ?>
                <div class="p-3 mb-2  text-black rounded-pill d-flex justify-content-around fs-3 mt-5 custom-bar">
                    <div class="d-flex justify-content-center" style="width:40%" ><?=$product['name_of_product']?></div>
                    <div class="d-flex justify-content-center" style="width:60%"><span style="color:#851c2a">Initial Stock : <?=$product['quantity_in_stock']?></span></div>
                </div>
                <?php } ?>
            </div>

            
        </main>


        <div>
            <i class="fas fa-backward"></i>
        </div>
		<footer class="footer-main p-2 d-flex justify-content-center ">
			Alex Store @2007
		</footer> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</html>
