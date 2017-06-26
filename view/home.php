
<?php $errorMessage = isset($errorMessage) ? $errorMessage : ''; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Your Library</title>

	<link rel="stylesheet" href="../assets/css/ressets.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/styleLibrary.css" type="text/css" />

</head>
<body>
<div class="wrrap">
	<div class="wrrap-sec">
		<div class="titleDiv">
			<div class="title">
				<a href="/homeController.php">
				
				<img src="http://Localhost/WapiLibrary/assets/images/is2.jpg" class="logo"/>
				
				</a>
			</div>
			
			<div class="userloged">
				<h1> Hello <?php echo $user->username; ?></h1>
				<div >
					<button class="logout"> <a href="/LogoutController.php"> Log Out</a></button>
				</div>
			</div>
		</div>
		<div id="homeButtons">
		
			<div >
				<button class = "buttons" onclick ="listAllBooks()">All Books</button>
			</div>
		
			<div >
				<button class = "buttons"><a href="/BooksController.php">Add New Book</a></button>
			</div>
			
		</div>
	
	
		
		<div id="result"></div>
	</div>
	
	<div class='error'>
		<?= $errorMessage ?>
	</div>
	
	
</div>

	<script src="../assets/js/main.js"></script> 
</body>
</html>


