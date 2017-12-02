
<?php

if (isset($_POST['submit'])) {

	include_once 'db_connection.php';

	$personFirst = mysqli_real_escape_string($conn, $_POST['personFirst']);
	$personLast = mysqli_real_escape_string($conn, $_POST['personLast']);
	$personEmail = mysqli_real_escape_string($conn, $_POST['personEmail']);
	$personPassword = mysqli_real_escape_string($conn, $_POST['personPassword']);

	//Error handlers
	//Check for empty fields
	if (empty($personFirst) || empty($personLast) || empty($personEmail) || empty($personPassword)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $personFirst)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} elseif (!preg_match("/^[a-zA-Z]*$/", $personLast)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		}  else {
			//Check if email is valid
			if (!filter_var($personEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			}
			else {
					//Hashing the password
					$hashedPwd = password_hash($personPassword, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO wishfie_users (firstname,lastname, email, password) VALUES ('$personFirst','$personLast', '$personEmail', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../index.html");
					exit();
				}
}
}

}
     else {
	      header("Location: ../signup.php");
	exit();
}

