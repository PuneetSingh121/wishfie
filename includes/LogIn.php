<?php
session_start();
if (isset($_POST['submit'])) {

	include_once 'db_connection.php';

	
	$personEmail = mysqli_real_escape_string($conn, $_POST['personEmail']);
	$personPassword = mysqli_real_escape_string($conn, $_POST['personPassword']);
	
	
	//Error handlers
	//Check for empty fields
	if ( empty($personEmail) || empty($personPassword)) {
		header("Location: ../login.php?login=empty");
		exit();
	} else {

			//Check if email is valid
			if (!filter_var($personEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../login.php?login=email");
				exit();
			}
			else {
				
			$sql = "SELECT * FROM wishfie_users WHERE email='$personEmail' AND password='$personPassword'";
			$result = mysqli_query($conn, $sql);
			
			
			$row=mysqli_fetch_assoc($result);
			$_SESSION["email"] = $row["email"];
			$_SESSION["id"] = $row["id"];
			header("Location: ../wishfie.php");
			
}
}
}

    else {
	      header("Location: ../login.php?error");
	exit();
}		
 
?>