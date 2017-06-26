<?php
class User implements JsonSerializable {
	private $id;
	private $username;
	private $password;
	
	
	function __construct($username, $password, $id = null) {
		
		if (strlen($username) === 0) {
			throw new Exception ( 'Empty username!' );
		}
		
		if (strlen($password) < 6){
			throw new Exception('Pass should be at least 6 simbols!' );
		}
		
		
		$this->username = $username;
		$this->password = $password;
		$this->id = $id;
		
	}
	
	
	public function jsonSerialize() {
		$result = get_object_vars($this);
		unset($result['password']);
		return $result;
	}
	
	public function __get($prop) {
		return $this->$prop;
	}
}


?>