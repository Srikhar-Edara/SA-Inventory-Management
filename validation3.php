<?php
	$errors = array('email'=>'', 'authentication'=>'');
	if(isset($_POST['submit'])){
		if(empty($_POST["email"])){
			$errors['email'] = "Your Username cannot be empty";
		}
		else{
			$email = $_POST["email"];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Username must be a valid email";
			}
			elseif(!($_POST['Authentication']==='Sandhya_Aqua')){
				$errors['authentication'] = "Access Code does not match";
			}
			if(!array_filter($errors)){
				header('Location: validation.php');

			}
		}

	}

?>
<!DOCTYPE html>
<html>	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style3.css">
		<title></title>
	</head>
	<body>
		<div class="container">
			<form action="validation3.php" method="post">
				<div class="form">
					<h2>Forgot Your Password?</h2>
					<label>
						<h3>Email address</h3>
						<input type="text" name="email" placeholder="Username">
						<div class="red-text"><?php echo $errors["email"]; ?></div>
					</label>
					<label>
						<h3>Authentication Code</h3>
						<input type="Password" name="Authentication" placeholder="Authentication Code">
						<div class="red-text"><?php echo $errors["authentication"]; ?></div>
					</label>
					<button class="Done" type="submit" name="submit">Retreive Password</button>


				</div>
			</form>
		</div>


	</body>
</html>