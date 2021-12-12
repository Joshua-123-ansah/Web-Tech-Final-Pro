
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
		<title>Accounts Creation Portal</title>
	</head>
	<?php
	//connect to post controller
		

		$errors=[];
		$id=$fullname=$email=$password=$re_password=$status=$DOB=$emailPost="";

		if(isset($_POST['submit'])){
			require("../controls/post_controller.php");

			// Grab form inputs
			//The htmlspecialchars is being used for security reasons
			$fullname=htmlspecialchars($_POST['fullname']);
			$id = htmlspecialchars($_POST['id']);
			$email=trim(htmlspecialchars($_POST['email']));
			$password=htmlspecialchars($_POST['password']);
			$re_password=htmlspecialchars($_POST['re_password']);
			$status=htmlspecialchars($_POST['status']);
			$DOB=htmlspecialchars($_POST['age']);

			//This is full name validation
			if(!preg_match('/^[a-zA-Z\s]+$/',$fullname)){
				$errors['fullname']="Fullname must only include letters and spaces";
			}
			//This is email validation
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email']="Must be an email. E.g:josh12@gmail.com";
			}
			//Password validation: Thus the password must be of length of least 8, contain lower and upper case characters as well as numbers
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)){
				$errors['password']= "Password length must be more than 8.";
			}
			//Validation for the id. Thus the ID must be of length 4
			if(!preg_match('/^[0-9]{4,4}+$/' ,$id)){
				$errors['id']= "ID must only contain numbers length 4 only";
			}

			//Checking whether password match with the re-entered password
			if($password!=$re_password){
				$errors['passcheck']= "Your password does not match";
			}

			


			$password=md5($password);
			$token=bin2hex(random_bytes(50));
			

			// create post if not empty
			$emailPost = getemail($email);
			if($emailPost){
				$already = "email already exists";
			}
			elseif(empty($errors)) { 
				$newPost = createPost($id,$fullname,$email,$password,$status,$DOB,$token);
				header("location: welcomescreen.php");
				// if($emailPost){
				// 	//Checking whether email already exist in the database 
				// 	$errors['exist']= "Email already exists in the database";
				// } 
			}
				// else{
				// 	ec
				// }
		}

	?>
	<body>
		<nav class="nav-main">
            <h2><a href="./admin_dashboard.php">Home</a></h2>
            <h2><a href="./login.php">Log Out</a></h2>
        </nav>


        <main class="d-flex justify-content-center" style="height:98%">
            <div class="mt-1">
                <form class="main-form" method="post" action="">
				<div class=text-danger><?php echo $already ?? ""?></div>
					<h3 class="mb-3">Create an account</h3>
                    <p>Create account for a worker to enable them access the system</p>

					<div class="mb-3">
						<div>
							<label for="name" class="form-label">Full Name</label>
							<input
								type="text"
								class="form-control"
								id="name"
								name="fullname"
								value="<?php echo $fullname; ?>"
								required
							/>
						</div>
						<div class=text-danger><?php echo $errors['fullname']?></div>
					</div>
					
					<div class="mb-3">
						<div>
							<label for="name" class="form-label">Email</label>
							<input
								type="email"
								class="form-control"
								id="name"
								name="email"
								value="<?php echo $email; ?>"
								required
							/>
						</div>
						<div class=text-danger><?php echo $errors['email']?></div>
					</div>
					
					<div class="mb-3">
						<div>
							<label for="name" class="form-label">ID</label>
							<input
								type="number"
								class="form-control"
								id="name"
								name="id"
								value="<?php echo $id?>"
								required
							/>
						</div>
						<div class=text-danger><?php echo $errors['id']?></div>
					</div>

					<div class="mb-3">
						<label for="name" class="form-label">Status</label>
						<input
							type="text"
							class="form-control"
							id="name"
							name="status"
							value="<?php echo $status?>"
							required
						/>
					</div>
					<div class="mb-3">
						<label for="name" class="form-label">Date of Birth</label>
						<input
							type="date"
							class="form-control"
							id="name"
							name="age"
							value="<?php echo $age?>"
							required
						/>
					</div>
					<div class="mb-3">
						<div>
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" required/>
						</div>
						<div class="text-danger fs-6"><?php echo $errors['password']?></div>
					</div>
                    <div class="mb-3">
						<div>
							<label for="password" class="form-label">Re-enter password</label>
							<input type="password" class="form-control" id="password" name="re_password" required/>
						</div>
						<div class=text-danger><?php echo $errors['passcheck']?></div>
					</div>
					<div class="login mb-3">
						<button type="submit" class="btn btn-primary" name="submit">Create Account</button>
					</div>
				</form>
            </div>
        </main>
		<footer class="footer-main p-2 d-flex justify-content-center ">
			Alex Store @2007
		</footer>
	</body>
	
</html>

























