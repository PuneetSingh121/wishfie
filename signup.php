<?php
	include_once 'header.php';
?>
<body>
	<header id="header">
		<h2>Sign Up</h2>
	</header>
<div class="jumbotron">
	<div class="container">
	<img src="men.png">
		<form method="POST" action="includes/signUp.php">
				<div class="font-input">
					<input type="text" name="personFirst" placeholder="FirstName">
				</div>

				<div class="font-input">
					<input type="text" name="personLast" placeholder="LastName">
				</div>

				<div class="font-input">
					<input type="text" name="personEmail" placeholder="E-mail">
				</div>

				<div class="font-input">
					<input type="password" name="personPassword" placeholder="Password">
				</div>
				<input type="submit" name="submit" value="Sign Up" class="btn-signup">
		</form>
		</div>
</div>

</body>

