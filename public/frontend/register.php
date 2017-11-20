<HTML>
	<head>

	</head>

	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input class="formField" type="text" name="first_name" placeholder="first name" required autofocus><br>
			<input class="formField" type="text" name="last_name" placeholder="last name" required><br>
			<input class="formField" type="email" name="email_adress" placeholder="email" required><br>
			<input class="formField" type="password" name="password" placeholder="password" required><br>
			<input class="formField" type="password" name="password_check" placeholder="password check" required><br>
			<input class="formField" type="checkbox" name="isAGBRead" required><br>
			<input type="submit" name="button" value="send">
		</form>
	</body>
	
	<?php 
		/*
			Author: Jonas Schumacher
		*/
		include 'Connect.php';
	
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$first_name = input($_POST["first_name"]);				//gets the first name from the formular
										
			$last_name = input($_POST["last_name"]);				//gets the last name from the formular
									
			$email = input($_POST["email_adress"]);					//gets the email adress from the formular
								
			$password = input($_POST["password"]);					//gets the password from the formular
			
			$password_check = input($_POST["password_check"]);		//to control if the passwords are equal
											
			
			if($password === $password_check){						//checks if the both inputs are equal
				$password_check = "";				
				$dataChain = array($first_name, $last_name, $email, password_hash($password, PASSWORD_DEFAULT));		//puts the parameters to an array
				
				$object = new Connect();							//creates an object of Connect.php
				$object->initRegister($dataChain);					//calls function initRegister()
				
				$first_name = "";
				$last_name = "";
				$email = "";
				$password = "";
			}else{
				echo "The passwords are not equal!";			
			}
			
		}
			
		function input($data){										//Filters 
			$data = trim($data);
			$data = stripslashes($data);
			$data = strip_tags($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	
	?>
	
</HTML>