<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start ();


if (isset ( $_SESSION ['user'] )) {
	try{
		$user = json_decode($_SESSION['user']);
		$userId = json_decode ( $_SESSION ['user'] )->id;
		
		if (isset($_GET['id'])) {
		
			$id = $_GET['id'];
		
			$dao = new BookDAO;
		
			$detailBook = $dao->infoBook($id);
		
			
				include '../view/bookDetails.php';
		
		
		
		}else{
			include '../view/addNewBook.php';
		}
		
		
		}
	catch (Exception $e) {
			$errorMessage = $e->getMessage();
			include '../view/index.php';
	}
		
}else {
		http_response_code ( 401 );
		echo '{"error": "not logged in"}';
		header('Location:homeController.php', true, 302);
		
}
	
	
	


?>