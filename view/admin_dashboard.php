
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
		<link rel="stylesheet" href="./styles/done.css" />
		
		<title>Admin</title>
	</head>

	<?php
        require("../controls/sales_controller.php");
		// require("../controls/sales_controller.php");
        $revenue=getRevenue();
    ?>

	<body>
		
		<div class="my_container">
			<div class="sidebar" style="height:100vh">
				<div class="home">
					<a href="">Home</a>
				</div>
				<div class="info">
					<img
						src="https://cdn.britannica.com/w:400,h:300,c:crop/42/193142-050-F69B1A23/Sundar-Pichai-Google.jpg"
						alt="img"
						class="mb-3"
					/>
					<h2 class="ms-4 mb-3 text-light">Admin</h2>
					<p class="text-light">Alex Owusu Ansah</p>
				</div>
				<div class="LogOut">
					<a href="./login.php">LogOut</a>
				</div>
				<p style="color:white">&copy Alex Store</p>
			</div>

			<div class="other_side">
				<div class="ms-5 mt-3 mb-5">
					<div>
						<h2 class="mb-5 ana">Analytics of goods</h2>
					</div>
					<div id="chartContainer" style="height: 370px; width: 90%;"></div>
				</div>
				<div class="rev-main">
                    <div class="d-flex justify-content-center">
                        <div>
							<button class="rounded-pill cus-button"><a href="./account_creation.php">Create New User</a></button>
							<button class="rounded-pill cus-button"><a href="./account_delete.php">Delete User</a></button>
							<button class="rounded-pill cus-button"><a href="./admin_view_for_all_product.php">View available goods</a></button>
						</div>
						<div>
							<button class="rounded-pill cus-button "><a href="./admin_view_for_remaining_product.php">View Remaining Goods</a></button>
							<button class="rounded-pill cus-button "><a href="./admin_view_for_selling_dashboard.php">Selling Dashboard</a></button>
							<button class="rounded-pill cus-button"><a href="./admin_add_product_view.php">Product Dashboard</a></button>
						</div>
						<div>
							<button class="rounded-pill cus-button "><a href="./admin_view_for_remaining_product.php">View Goods that Sales</a></button>
							
						</div>
                    </div>
                    <div class="rounded-pill revenue">
                        <h2>Revenue</h2>
                        <h3>GHC <?=$revenue[0]['Revenue']?>.00</h3>
                    </div>
                </div>
			</div>
		</div>
		<br>
	</body>
	<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	title:{
		text: "Sales Tracker"
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Sales (in GHC)",
		valueFormatString: "GHC##0.00",
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			labelFormatter: function(e) {
				return "$" + CanvasJS.formatNumber(e.value, "########");
			}
		}
	},
	data: [{
		type: "area",
		xValueFormatString: "######",
		yValueFormatString: "$##0",
		dataPoints: [
			{ x:"Nissan Frontier ", y: 2000 },

			{ x: new Date(2017, 08, 04), y: 3500 },
			{ x: new Date(2017, 08, 05), y: 2500 },
			{ x: new Date(2017, 08, 06), y: 1000 },
			{ x: new Date(2017, 08, 07), y: 1740 }
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);

}
</script>
	<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</html>
