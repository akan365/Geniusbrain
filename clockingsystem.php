<html>
<head>CS
</head>
<body>
<form action ="clockingsystem.php" method ="post">
<label>Personel</label><br>
<input type="text" name="personel"><br>
<label>Identification</label><br>
<input type="password" name="password"><br>
<input type="submit" name="checkin" value="submit">
</form>
</body>
</html>
<?php
 
  
  //create a connection_aborted
  $conn = mysqli_connect("localhost", "clock","test1234", "clocking_system" );
    if ($conn->connect_error){
		die("connection failed: $conn->connect_error");
	}

    if(isset($_POST["checkin"])){
		    
		if(isset($_POST["personel"]) && isset($_POST["password"])){
			$person  = $_POST["personel"];
			$password= $_POST["password"];
			
			//preparing a statement to prevent sql injection
			$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password=?");
			$stmt->bind_param("ss", $person, $password);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				echo "it is $person <br>";
			}
			
			
	}else{
		echo "Please input both name and ID";
	}
		$stmt->close();
	}
	
	$conn->close();
?>