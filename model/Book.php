<?php
	class Book implements JsonSerializable {
		private $id;
		private $title;
		private $resume;
		private $pages;
		private $format;
		private $author;
		private $coverImage;
		private $isbn;
		private $publishDate;
		private $creationDate;
		private $userId;
		
		
		
		
		private function findIsbn($str){
		
			$regex = '/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i';
		
			if (preg_match($regex, str_replace('-', '', $str), $matches)) {
				return (10 === strlen($matches[1]))
				? 1   // ISBN-10
				: 2;  // ISBN-13
			}
			return false; // No valid ISBN found
			
// 			var_dump(findIsbn('ISBN:0-306-40615-2'));     // return 1
// 			var_dump(findIsbn('0-306-40615-2'));          // return 1
// 			var_dump(findIsbn('ISBN:0306406152'));        // return 1
// 			var_dump(findIsbn('0306406152'));             // return 1
// 			var_dump(findIsbn('ISBN:979-1-090-63607-1')); // return 2
// 			var_dump(findIsbn('979-1-090-63607-1'));      // return 2
// 			var_dump(findIsbn('ISBN:9791090636071'));     // return 2
// 			var_dump(findIsbn('9791090636071'));          // return 2
// 			var_dump(findIsbn('ISBN:97811'));             // return false
		
			
		}
			
		
		public function setId($id){
			
			if(is_numeric($id) && $id > 0){
			 $this->id = $id;
			}
		
		}
		
		public function setImage($image){
			if($image === null){
				$this->coverImage='lib3.jpg';
			}else{
				$this->coverImage = $image;
			}
		
		}
		
		public function setCreationDate($date){
			$this->creationDate = $date;
		
		}

		public function __construct($title, $author, $isbn, $userId, $resume= null, $pages= null, $format=null,
				$publishDate=null) {
			
			if (empty($title) || empty($author) || empty($isbn) )
				throw new Exception("Some fields can't be empty!");
			
			
				if($this->findIsbn($isbn)!== false){
					$this->isbn = $isbn;
				}else{
					throw new Exception("Wrong ISBN!!!");
				}
				
			
			
			$this->title = $title;
			$this->author = $author;
			$this->resume = $resume;
			$this->pages = $pages;
			$this->format = $format;
			$this->publishDate = $publishDate;
			$this->userId = $userId;
			
			
		}
		
		public function jsonSerialize() {
			return get_object_vars($this);
		}
		
		public function __get($prop) {			
			return $this->$prop;
		}
				
			
	}
?>