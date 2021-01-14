<?php
	$errors = array('email'=>'','password'=>'');
	if(isset($_POST['submit'])){
		if(empty($_POST["email"])){
			$errors['email'] = "Your Username cannot be empty";
		}
		elseif (empty($_POST["password"])){
			$errors['password'] = "Your Password cannot be empty"; 
		}
		else{
			$email = $_POST["email"];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Username must be a valid email";
			}
			if(!array_filter($errors)){
				header('Location: inventory_management.php');

			}
		}

	}

?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title></title>
	</head>
	<body>
		<div class="container">
			<form action="validation.php" method="post">
				<div class="form">
					<h2>Sign in</h2>
					<label>
						<h3>Email address</h3>
						<input type="text" name="email" placeholder="Username">
						<div class="red-text"><?php echo $errors["email"]; ?></div>	
					</label>
					<label>
						<h3>Password</h3>
						<input type="Password" name="password" placeholder="Password">
						<div class="red-text"><?php echo $errors["password"]; ?></div>
					</label>
					<button class="Done" type="submit" name="submit">Sign in</button>
					<a class="sign-up" href="Sign_Up.html">Sign Up?</a>
					<a class="forgot-pass" href="Forgot_Password.html">Forgot Password?</a>

				</div>
			</form>
		</div>

	</body>
</html>
