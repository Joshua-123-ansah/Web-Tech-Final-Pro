
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
		<title>Delete Account</title>
	</head>
	<?php

		$error=$fullname="";

		if(isset($_POST['delete'])){
			require("../controls/post_controller.php");

			// Grab form inputs
			//The htmlspecialchars is being used for security reasons
			$fullname=trim(htmlspecialchars($_POST['name']));

			// create post if not empty
			$delete = deleteUser($fullname);
			
			if($delete){
			    header("location: account_deleted_dis.php");
			}else{
				$error="Incorrect username";
			}
		}

	?>
	<body>
		<nav class="nav-main">
            <h2><a href="admin_dashboard.php">Home</a></h2>
            <h2><a href="login.php">Log Out</a></h2>
        </nav>


        <main style="height:93%">
            <div class="main-form position-absolute top-50 start-50 translate-middle">
                <form action="" method="post">
					<h3 class="mb-3">Delete account</h3>
                    <p class="mb-3">Delete the account of a user to prevent access</p>
					<div class="mb-3">
						<label for="name" class="form-label">Fullname of the user</label>
						<input
							type="text"
							class="form-control"
							id="name"
							name="name"
							value="<?php echo $fullname; ?>"
						/>
					</div>
					<div class="login mb-5">
						<button type="submit" class="btn btn-primary" name="delete">Delete Account</button>
						<div class=text-danger><?php echo $error?></div>
					</div>
				</form>
            </div>
        </main>
		<footer class="footer-main p-2 d-flex justify-content-center ">
			Alex Store @2007
		</footer>
	</body>
</html>
