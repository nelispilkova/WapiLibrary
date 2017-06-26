


<?php $errorMessage = isset($errorMessage) ? $errorMessage : ''; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Login</title>
	<link rel="stylesheet" href="../assets/css/ressets.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/styleLibrary.css" type="text/css" />
	 
</head>
<body>
<div class="wrrap">
	<div class="wrrap-sec">
		<div class="titleLogPage">
			<a href="http:/homeController.php">

				<img src="http://Localhost/WapiLibrary/assets/images/is2.jpg" class="logo"/>

			</a>
		</div>
		
		<div id="logForm">
	
			<fieldset>
				<div><h3>Login</h3></div>
				<form  method="post" action="/LoginController.php" >
				
					<div id="userDiv">
						<input class="addInput" id="username" type="text"  name="username" placeholder="  Username" />
					</div>
		
					<div id="user-pass">
						<input id="pass"  class ="addInput" type="password"  name= "pass" placeholder="  Password" />
					</div>
					
					
		
					<div>
						<input id="log-log" type="submit" value="Login"  name="submit"/>
					</div>
					
				</form>
				
				
			</fieldset>
			<div class='errorr'>
					<?= $errorMessage ?>
			</div>
		</div>
	</div>
</div>
	

<script src="../assets/js/logScript.js"></script> 	
</body>
</html>


