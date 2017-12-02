<?php
	session_start();

	include_once 'includes/db_connection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Wishfie</title>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

<body>

	<header id="header" style="background-color:#ADD8E6;">
		<h2 class="left" style="margin-left:450px;">Wishfie</h2>
		
	</header>

	<div class="clear"></div>
	
	<div class="jumbotron"> 
		<h3>Welcome to Wishfie you can post anything here...</h3>
			<div class="container">
				<?php

					echo $_SESSION["email"]."<Br><br>";
					$user_id = $_SESSION["id"];

					$sql = "SELECT * FROM users1 WHERE id='$user_id'";
					$result = mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);

					echo "<b>User intersets : </b>".$row['Interests']."<br>";

					$array = explode(",",$row['Follows']);
					

					foreach ($array as $key) {
						// echo $key;
					$sql = "SELECT * FROM posts WHERE Posted_by='$key'";
					
						$result = mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);

					echo " <b>Follower:</b>  ".   $row['Topics']." ".$row['Tags']." ".$row['Views'] ." " .$row['Likes']."<br>";
						
					}

				?>


			</div>

	<div id="demo" style="margin-left:100px"></div>

<footer>www.wishfie.com</footer>
	</div>

</body>

</html>

<script type="text/javascript">
	function run(){
		var text = document.getElementById("name").value;
		var xhttp = new XMLHttpRequest();
    
    console.log("https://itunes.apple.com/search?term="+text+"&limit=5");
		xhttp.open("GET", "https://itunes.apple.com/search?term="+text+"&limit=5", true);
	xhttp.send();

		xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        	var response = JSON.parse(this.responseText);
        	console.log(response);
        	
        	for(i=0;i<response.resultCount;i++){
            
            document.getElementById("demo").innerHTML += response.results[i].artistName +"<br>"+
            												"<audio controls src='"+response.results[i].previewUrl+"'>"
            												+ "Link" +"</audio><hr>";
            
            }
       }
    };
	}
</script>