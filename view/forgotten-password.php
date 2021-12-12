
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
		<link rel="stylesheet" href="./styles/style.css" />
		<title>Password Recovery Page</title>
	</head>

	<?php
		$error=$email="";

		if(isset($_POST['submit'])){
		require("../controls/post_controller.php");
		require("../controls/emailController.php");
			// Grab form inputs
			//The htmlspecialchars is being used for security reasons
			$email=htmlspecialchars($_POST['email']);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email']="Must be an email. E.g:josh12@gmail.com";
			}

		
			$user = getemail($email);
		
			
			if($user){
				sendPasswordResettLink($email);
			    header("location: passwordResetMessage.php");
               
	
			}else{
				$error="Your email name does not exist in our database";
			}
		}

	?>

	<body>
		<div class="login-main">
			<div class="column login-wrapper">
				<h1>ALEX STORE</h1>
			</div>

			<div class="column col">
				<form action="" method="POST">
					<h3 class="mb-5">Recover your password</h3>
					
					<div class=text-danger><?php echo $error?></div>
					<div class="mb-3">
						<label for="password" class="form-label">Email</label>
						<input type="email" class="form-control" id="password" name="email" placeholder="Enter email you use when logging into the system" value="<?php echo $email; ?>" required/>
					</div>
				
					<div class="login mb-3">
						<button type="submit" class="btn btn-primary" name="submit">Recover my Password</button>
					</div>
				
				</form>
			</div>
		</div>
		
	</body>
	<footer class="footer-main p-2 d-flex justify-content-center ">
		Alex Store @2007
	</footer>
</html>