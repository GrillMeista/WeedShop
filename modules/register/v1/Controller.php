<?php
	include 'BackendConnect.php';

	class Controller{
		
		 function validateData($array){
			 
			 
			$splitAdress = explode(" ", $array[5]);
			 echo "<br>Straße: " . $splitAdress[0] . "<br>Nummer: " . $splitAdress[1] . "<br>";
			$array[5] = $splitAdress[0];
			
			$splitAdress[2] = $array[6];
			
			$array[6] = $splitAdress[1];
			$array[7] = $splitAdress[2];
			 
			for($i = 0; $i < 8; $i++){									//first_name, last_name, email, password, plz
				$array[$i] = $this->standartValidator($array[$i]);
				echo $i . " => " . $array[$i] . "<br>";
			} 
			 
			print_r($array);
			 
			(new BackendConnect())->sendToDatabase($array);
		}
	
		 function standartValidator($input){
			$input = htmlspecialchars($input);
			$input = trim($input);
			$input = strip_tags($input);

			if(empty($input)){
			 	echo "Controller Error: modules/Register/v1/Controller.php line 31 - empty input";
			}
			
			return $input;
		}	
	}

?>