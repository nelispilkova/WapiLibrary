<?php

define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'wapi-library' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );


class DBConnection {
	private static $db = null;
	
	private function __construct() {
		
	}
	
	
	public static function getDb() {
		if (self::$db === null) {
			try {
				self::$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
				self::$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
			catch (PDOException $e) {
				header('Location:underconstructionController.php', true, 302);
			
			}
		}
		
		return self::$db;
	}
}
?>