
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
		<title>Login</title>
	</head>

	<?php
		$errors=array('email'=>'','password'=>'','gen'=>'');
		$email=$password=$gen="";


		if(isset($_POST['login'])){
			require("../controls/post_controller.php");
			
			// Grab form inputs
			//The htmlspecialchars is being used for security reasons
			$email=trim(htmlspecialchars($_POST['email']));
			$password=htmlspecialchars($_POST['password']);
			//This is email validation
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email']="Must be an email. E.g:josh12@gmail.com";
			}
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)){
				$errors['password']= "Password length must be more than 8.";
			}
	

			$password=md5($password);
			
			// create post if not empty
			$newPost = getSinglePost($password,$email);
			
			if($newPost && $newPost['status']=="admin"){
			    header("location: admin_dashboard.php");
			}else if($newPost && $newPost['status']=="user"){
				header("location: workersdashboard.php");
			}
			else{
				$errors['gen']="Incorrect email or password";
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
					<h3 class="mb-5">Great to see you again</h3>
					<div class=text-danger><?php echo $errors['gen']?></div>
					<div class="mb-3">
						<div>
							<label for="name" class="form-label">email</label>
							<input
								type="text"
								class="form-control"
								id="name"
								name="email"
								required
							/>
						</div>
						<div class=text-danger><?php echo $errors['email']?></div>
					</div>
					
					<div class="mb-3">
						<div>
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" required/>
						</div>
						<div class=text-danger><?php echo $errors['password']?></div>
					</div>
					
					<div class="login mb-3">
						<button type="submit" class="btn btn-primary" name="login">Login</button>
					</div>
					<div >
						<a href="forgotten-password.php" style="color:#851c2a">Forgot Password</a>
						
					</div>
				</form>
			</div>
		</div>
		
	</body>
	<footer class="footer-main p-2 d-flex justify-content-center ">
		Alex Store @2007
	</footer>
</html>