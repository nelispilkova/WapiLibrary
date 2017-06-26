


<?php 
	$errorMessage = isset($errorMessage) ? $errorMessage : '';
	$success = isset($success) ? $success : '';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Add New Book</title>
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
					<button class="logout"> <a href="/LogoutController.php"> Log Out</a></button>
				</div>
				
			</div>
			
		</div>
		<div class="add">
			<fieldset >
				<h3>Add New Book</h3>
				<form  method="post" action="/AddNewBooksController.php" enctype="multipart/form-data">
			
					<div class="addDiv" id="titleDiv">
						<input class="addInput" id="title" type="text"  name="title" placeholder="  Book title"  />
					</div>
		
					<div class="addDiv" id="authorDiv">
						<input class="addInput" id="author" type="text"  name= "author" placeholder="  Book author"/>
					</div>
					
					<div class="addDiv" id="isbnDiv">
						<input  class="addInput" id="isbn" type="text"  name= "isbn" placeholder="  Book ISBN" />
					</div>
					
					<div class="addDiv" id="pageDiv">
						<input  class="addInput" id="pages" name ="pages" type="number" placeholder="  Book pages"  />
					</div>
		
					<div class="addDiv" id="resumeDiv">
						<textarea class="addInput"  id="resume" name="resume"  placeholder="  Book resume" ></textarea>
					</div>
					
					<div class="addDiv" id="pDateDiv">
						<input class="addInput" id="pDate" type="text" name= "pDate" placeholder="  Publish year" />
						
					</div>
					<div class="addDiv" id="formatDiv">
						 <select  class="addInput" id="format" name="format"  >
						 
						 	<option value="Choose format">Choose format</option>
							 <option value="A4">A4</option>
							 <option value="A3">A3</option>
							 </select>
							
					</div>
					
					<div id="uploadImg">
				
							<input  class="addInput" type="file" name="files[]" id="image" accept="image/*"/>
							
			        		<input type='hidden' name='MAX_FILE_SIZE' value='10000000' />
			        	
					</div>	
		
					<div class="submit">
						<input  id='save' type="submit" value="Save"  name="save"/>
					</div>
					
				</form>
				<div class='success'>
						<?= $success ?>
				</div>
				
				
				<div class='errorr'>
						<?= $errorMessage ?>
				</div>
			</fieldset>
			</div>
		</div>
	</div>
	
	<script src="../assets/js/jquery-3.1.1.min.js"></script> 	
	<script src="../assets/js/addBookScript.js"></script> 	
</body>
</html>


