<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

if (isset($_GET['isbn'])){
	
$isbnForCheck = $_GET['isbn'];

$db = DBConnection::getDb();
$sql = $db->query("SELECT * FROM books WHERE book_ISBN = ".$db->quote($isbnForCheck)."");
	if ($sql->rowCount() > 0){
		echo "true";
	}else{ echo "false";}


}