<?php

	session_start();
	
	if (isset($_SESSION['user'])) {	
		try{
			$user = json_decode($_SESSION['user']);
			include '../view/home.php';
			
	// 		if ($_SERVER ['REQUEST_METHOD'] === 'GET') {
	// 			// list all contacts
	// 			$dao = new BookDAO;
	// 			echo json_encode ( $dao->listAllBooks () );
	// 		}
		}catch (Exception $e) {
			$errorMessage = $e->getMessage();
			include '../view/home.php';
		}
	}
	else
		include '../view/index.php';
// 		header('Location:../view/index.php');
?>