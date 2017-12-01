<?php
//include ('../../../config/DBconfig.php');

	class BackendConnect{
		
		function sendToDatabase($array){
			echo "<br>Welcome in the Backend<br>";
			print_r($array);
			echo "<br>";
			
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$database = "cannasite";
			
			$conn = mysqli_connect($hostname, $username, $password, $database);
			
			if(!$conn){
				echo "<br>Fehler beim verbinden";
			}
			
			$sql = "INSERT INTO customers (first_name, last_name, email_adress, password, plz, straße, nr, telephone) 
			VALUES ('" . $array[0] . "', '" . $array[1] . "', '" . $array[2] . "', '" . $array[3] . "', '" . $array[4] . 
				"', '" . $array[5] . "', '" . $array[6] . "', '" . $array[7] . "')";
			
			mysqli_query($conn, $sql);
			
			$conn->close();
		}
	}

?>