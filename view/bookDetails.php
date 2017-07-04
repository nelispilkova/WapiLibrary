<?php

$errorMessage = isset($errorMessage) ? $errorMessage : '';
$success = isset($success) ? $success : '';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Your library</title>
 	<link rel="stylesheet" href="../assets/css/ressets.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/styleLibrary.css" type="text/css" />
</head>
<body>
<div class="wrrap">
	<div class="wrrap-sec">
	
		<div class="titleDiv">
			<div class="title">
				<a href="http:/homeController.php">
				
				<img src="http://Localhost/WapiLibrary/assets/images/is2.jpg" class="logo"/>
				
				</a>
			</div>
			<div class="userloged">
				<h1> Hello <?php echo $user->username; ?></h1>
				<div >
					 <a href="/LogoutController.php"><button class="logout">Log Out</button></a>
				</div>
				
			</div>
			
		</div>
		<div id="infoBook">
		
				<div id="bookTitle">
					<h1><?php echo $detailBook->title; ?></h1>
					
					
				</div>
				
				<div id="from">
						<span>By</span> 
				</div>
				
				<div id="bookAuthor">
						<span><?php echo $detailBook->author; ?></span> 
				</div>
					
				
				<div id="imgAndResume">
					<div id="cover">
						<img src="http://Localhost/WapiLibrary/assets/cover/<?php echo $detailBook->coverImage; ?>"   />
					</div>
					
						
			
					<div id="bookResume">
						<span><?php echo $detailBook->resume; ?></span> 
						
					</div>
			
					
					<div id="bookPages">
						<span>Pages: <?php echo $detailBook->pages; ?></span> 
						
					</div>
					
					<div id="pubDate">
						<span>Publish year: <?php echo $detailBook->publishDate; ?></span> 
					</div>
				
					<div id="bookIsbn">
						<span>ISBN: <?php echo $detailBook->isbn; ?></span> 
					</div>
					
				</div>
					
				
				
				
					
			
					
				<div class='success'>
						<?= $success ?>
				</div>
				
				<div class='errorr'>
						<?= $errorMessage ?>
				</div>
		
			</div>
		</div>
	</div>
	
	
</body>
</html>


