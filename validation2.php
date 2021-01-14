<?php
	$errors = array('email'=>'','password'=>'', 'confirm_password'=>'', 'authentication'=>'');
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
			elseif(!($_POST["password"]===$_POST["confirm_password"])){
				$errors["confirm_password"] = "Passwords must be the same";
			}
			elseif(!($_POST['authentication']==='Sandhya_Aqua')){
				$errors['authentication'] = "Access Code does not match";
			} 

			$conn=mysqli_connect('localhost','Srikhar','Dazaiorihara1$','saepl');
			if(!$conn){
				echo 'Connection Error: ' . mysqli_connect_error();
			}

			$qry = 'INSERT  users_sandhyaaqua';

			$result = mysqli_query($conn, $qry);

			$Users = mysqli_fetch_all($result, MYSQLI_ASSOC);

			mysqli_free_result($result);

			mysqli_close($conn);

			print_r($Users);

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
		<link rel="stylesheet" type="text/css" href="style2.css">
		<title></title>
	</head>
	<body>
		<div class="container">
			<form action="validation2.php" method="post">
				<div class="form">
					<h2>Sign up</h2>
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
					<label>
						<h3 id="confirm">Confirm Password</h3>
						<input type="Password" name="confirm_password" placeholder="Confirm_Password">
						<div class="red-text"><?php echo $errors["confirm_password"]; ?></div>
					</label>
					<label>
						<h3 id="authentication">Authentication Code</h3>
						<input type="Password" name="authentication" placeholder="Authentication Code">
						<div class="red-text"><?php echo $errors["authentication"]; ?></div>
					</label>
					<button class="Done" type="submit" name="submit">Sign up</button>

				</div>
			</form>
		</div>


	</body>
</html>