<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start ();

if (isset ( $_SESSION ['user'] )) {
	$user = json_decode($_SESSION['user']);
	$userId = json_decode ( $_SESSION ['user'] )->id;

	

	if (isset($_POST['save'])) {
	
	
		try {
			$book = new Book(
					htmlentities(trim($_POST['title'])),
					htmlentities(trim($_POST['author'])),
					htmlentities(trim($_POST['isbn'])),
					$userId,
					htmlentities(trim($_POST['resume'])),
					htmlentities(trim($_POST['pages'])),
					htmlentities(trim($_POST['format'])),
				
					htmlentities(trim($_POST['pDate']))
					
						
						
					);
			
	
	
			if(isset($_FILES['files']['name'][0])){
				$errors=array();
				foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
					if($_FILES['files']['error'][$key] > 0){
						continue;
					}
					$file_name = $key.$_FILES['files']['name'][$key];
					$file_size =$_FILES['files']['size'][$key];
					$file_tmp =$_FILES['files']['tmp_name'][$key];
					$file_type=$_FILES['files']['type'][$key];
					if($file_size > 2097152){
						$errors[]='File size must be less than 2 MB';
					}
					if(empty($errors)==true){
						$extensions = array("jpeg","jpg","png");
						$name=$_FILES['files']['name'][$key];
						$file_ext=pathinfo($name, PATHINFO_EXTENSION);
	
	
						if(in_array($file_ext,$extensions ) === true){
	
							$img = (new BookDAO)->randomName($file_ext);
						
								
							move_uploaded_file($file_tmp,"../assets/cover/{$img}");
							$book->setImage($img);
						}else{
							$errors[]="extension not allowed";
						}
					}
				}
			}
		if(empty($errors)==true){
	
			$dao = new BookDAO();
			$dao->addBook($book);
			$success = "You add a book successfully!";
			include '../view/addNewBook.php';
		}else{
			for($index=0; $index < count($errors); $index++){
				$errorMessage = $errors[$index];
				
			}
			include '../view/addNewBook.php';
		}
		
		}
		catch (Exception $e) {
			$errorMessage = $e->getMessage();
			include '../view/addNewBook.php';
		}
	}
	
	
	}else {
		http_response_code ( 401 );
		echo '{"error": "not logged in"}';
		header('Location:homeController.php', true, 302);
		
		
	}
	
	


?>