<html>
<body>
<form action ="clockingsystem.php" method ="post">
<div style="background-color:orange; text-align:center;
padding:20px; border: 2px solid #ddd; margin-bottom: 20px;">
<head>Checking in
</head>
<label>Personel</label><br>
<img src="2.png" alt="time brokers" width="100" height="100" style="border:2px solid green;" title="keep coming early">
<br>
<input type="text" name="personel"><br>
<label>Identification</label><br>
<input type="password" name="password"><br>
<input type="submit" name="checkin" value="check in"><br>
</form>
<form action="clockingsystem.php" method="post">
<body><div style="background-color:red; text-align:center;
padding:2px; border: 1px solid green; margin-bottom: 20px;">
<h2>checking out</h2>
<label>Personel</label><br>
<img src="1.png" alt="time brokers" width="100" height="100" style="border:2px solid green;" title="Goodnight"><br>
<input type="text" name="personel1"><br>
<label>Identification</label><br>
<input type="password" name="password1"><br>
<input type="submit" name="checkout1" value="check out"><br>
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
			$hashedpassword= password_hash($password, PASSWORD_DEFAULT);
			
			//preparing a statement to prevent sql injection
			$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password=?");
			$stmt->bind_param("ss", $person, $password);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
			   $row = $result->fetch_assoc();
			   $user_id = $row["id"];
			   $checkin_time=time();
			   
			 
			  echo "$person checked in at\n ". date("h:i:s A", $checkin_time);
			
			  }else{
				  echo "please input correct name and identification";
				  
			  } 
			}		
	}
	
	$conn->close();
	?>

<?php
 $conn = mysqli_connect("localhost", "clock","test1234", "clocking_system" );
    if ($conn->connect_error){
		die("connection failed: $conn->connect_error");
	}
if(isset($_POST["checkout1"])){
    if(isset($_POST["personel1"]) && isset($_POST["password1"])){
		    $person1  = $_POST["personel1"];
			$password1= $_POST["password1"];
			
			
			//preparing a statement to prevent sql injection
			$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password=?");
			$stmt->bind_param("ii", $person1, $password1);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
			   $row = $result->fetch_assoc();
			   $user_id = $row["id"];
			   $checkin_time=time();
			   
			   
			  echo "$person1 checked out at\n "." ".  date("h:i:s A", $checkin_time);
				
			  }else{
				  echo "please input correct name and identification";	
	}
	}

	}



	?>