
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
		<title>Password Reset Page</title>
	</head>

	<?php

		$errors=array('password'=>'','re_password'=>'');
		$password=$re_password="";
        $password_change="";


		if(isset($_POST['submit'])){
			require("../controls/post_controller.php");
    

			// Grab form inputs
			//The htmlspecialchars is being used for security reasons
			$password=trim(htmlspecialchars($_POST['password']));
			$re_password=htmlspecialchars($_POST['re_password']);
			//This is email validation
			
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)){
				$errors['password']= "Password length must be more than 8.";
			}

            if($password!=$re_password){
				$errors['re_password']= "Your password does not match";
			}
	

			$password=md5($password);
            $email=$_SESSION['email'];
		

			// create post if not empty
			$passwordUpdate = updateUserInfo($password,$email);
			if($passwordUpdate){
				// print("Password updated");
				// header("location: passwordResetMessage.php");
			    $password_change='You have successfully changed your password.';
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
					<h3 class="mb-5">Reset your password</h3>
					<div class=text-success><?php echo $password_change?></div>
                    <div class=text-danger><?php echo $errors['re_password']?></div>
					<div class="mb-3">
						<div>
							<label for="name" class="form-label">Password</label>
							<input
								type="password"
								class="form-control"
								id="name"
								name="password"
								required
							/>
						</div>
						<div class=text-danger><?php echo $errors['password']?></div>
					</div>
					
					<div class="mb-3">
						<div>
							<label for="password" class="form-label">Re-enter Password</label>
							<input type="password" class="form-control" id="password" name="re_password" required/>
						</div>
						
					</div>
					
					<div class="login mb-3">
						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</div>
					<div >
						<a href="login.php" class="fs-4" style="color:#851c2a">Login</a>
					</div>
				</form>
			</div>
		</div>
		
	</body>
	<footer class="footer-main p-2 d-flex justify-content-center ">
		Alex Store @2007
	</footer>
</html>