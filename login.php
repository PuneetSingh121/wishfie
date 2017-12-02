<?php
	include_once 'header.php';
	require_once "config.php";

	$redirectURL ="http://localhost/wishfie/fb-callback.php";
	$permissions= ["email"];
	$loginURL = $helper->getLoginURL($redirectURL,$permissions);

?>
<body>
	<header id="header">
		<h2>Log In</h2>
	</header>
<div class="jumbotron">
	<div class="container">
	<img src="men.png">	
		<form method="POST" action="includes/Login.php">
				<div class="font-input">

				<div class="font-input">
					<input type="text" name="personEmail" placeholder="E-mail">
				</div>

				<div class="font-input">
					<input type="password" name="personPassword" placeholder="Password">
				</div>
				<input type="submit" name="submit" value="Log-in" class="btn btn-primary"><br><br>
				
		</form>

		</div>
		<input type="submit" name="submit" onclick="window.location = '<?php echo $loginURL ?>';"  value="Log-in with Facebook" class="btn btn-primary wow" style="background-color:blue;">
	
</div>

</body>

