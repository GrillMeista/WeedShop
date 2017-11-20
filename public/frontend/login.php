<HTML>
	<head>

	</head>

	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input class="formField" type="email" name="email_adress" placeholder="Email" required autofocus><br>
			<input class="formField" type="password" name="password" placeholder="Passwort" required autofocus><br>
			<input type="submit" name="button" value="send"><br>
		</form>
	</body>
	<?php 
	
		include 'Connect.php';
	
		if($_SERVER["REQUEST_METHOD"] == "POST"){
									
			$email = input($_POST["email_adress"]);									//gets the email adress from the formular
								
			$password = input($_POST["password"]);									//gets the password from the formular
											
			
			if(!empty($email) && !empty($password)){								//checks if the both inputs aren't empty				
				$dataChain = array($email, $password);								//puts the parameters to an array
				echo $dataChain[0] . "<br>";
				echo $dataChain[1];
				$object = new Connect();											//creates an object of Connect.php
				$output = $object->checkLoginPassword($dataChain);					//calls function checkLoginPassword()
				echo $output;
				$email = "";
				$password = "";
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