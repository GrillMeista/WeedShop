<?php

class Connect{
	
	private $servername = "localhost";
	private $username   = "root";
	private $password   = "";
	private $database   = "cannasite";
	
	private $registerArray;
	private $loginArray;
	
	public function initRegister($array){
		$this->registerArray = $array;
		$this->registerUser();
	}
	
	function checkLoginPassword($array){
		//$this->loginArray = $array;
		
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
		
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT password FROM customers WHERE email_adress='" . $array[0] . "'";
		
		$result = mysqli_query($conn, $sql); 

		$data = mysqli_fetch_row($result);
		
			
		if (password_verify($array[1], $data[0])) {
    		return "Valid password";
		} else {
			return "Invalid password";
		}
		$conn->close();
	}
	
	private function registerUser(){
		
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
		
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		
		$result = mysqli_query($conn,"SELECT COUNT(first_name) as userCount FROM customers WHERE email_adress = '" . $this->registerArray[2] . "'");
		$result = $result->fetch_object();
		
		
		if($result->userCount === '0'){
			$sql = "INSERT INTO customers (first_name, last_name, email_adress, password)
			VALUES ('" . $this->registerArray[0] . "', '" . $this->registerArray[1] . "', '" . $this->registerArray[2] . "', '" . $this->registerArray[3] . "')";

			if ($conn->query($sql) === TRUE) {
				$last_id = $conn->insert_id;
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		$conn->close();
	}}

?>