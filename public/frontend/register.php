<HTML>
	<head>

	</head>

	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type="text" name="first_name" placeholder="first name" required autofocus><br>
			<input type="text" name="last_name" placeholder="last name" required><br>
			<input type="email" name="email_adress" placeholder="email" required><br>
			<input type="password" name="password" placeholder="password" required><br>
			<input type="password" name="password_check" placeholder="password check" required><br>
			<input type="text" name="plz" placeholder="plz" required><br>
			<input type="text" name="adress" placeholder="adress" required><br>
			<input type="text" name="telephone" placeholder="telephone"><br>
			<input type="checkbox" name="isAGBRead" required><br>
			<input type="submit" name="button" value="send">
		</form>
	</body>
	
	<?php 
		/*
			Author: Jonas Schumacher
		*/
		include('../../modules/register/v1/Controller.php');
			
		$first_name = $last_name = $email = $password = $plz = $adress = $telephone = "";
	
		if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['password'] === $_POST['password_check']){								
												
			$data = array(
			$_POST["first_name"],									//gets the first name from the formular	
			$_POST["last_name"],									//gets the last name from the formular	
			$_POST["email_adress"],									//gets the email adress from the formular
			password_hash($_POST['password'], PASSWORD_DEFAULT),	//gets the password from the formular
			$_POST["plz"],											//gets the plz from the formular
			$_POST["adress"],										//gets the adress from the formular
			$_POST["telephone"]										//gets the telephone from the formular
			);
			
			(new Controller())->validateData($data);
			
		}else{
			echo "The password is incorrect!";
		}
	?>
	
</HTML>