<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

 session_start ();
 if (isset ( $_SESSION ['user'] )) {
	
	try{

		if ($_SERVER ['REQUEST_METHOD'] === 'GET') {
			// list all contacts
			$dao = new BookDAO;
			echo json_encode ( $dao->listAllBooks () );
		}
	}catch (Exception $e) {
		$errorMessage = $e->getMessage();
		include '../view/home.php';
	}
 }else{
 	http_response_code ( 401 );
 	echo '{"error": "not logged in"}';
 	header('Location:homeController.php', true, 302);
 }

	

   ?>