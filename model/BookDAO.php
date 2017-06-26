<?php
class BookDAO {
	private $db;
	const ADD_NEW_BOOK_SQL = 'INSERT INTO books VALUES(null,(SELECT NOW()),?,?,?,?,?,?,?,?,?)';
	
	const GET_ALL_BOOKS_SQL = "SELECT book_id, book_title, book_author, book_image, book_ISBN, user_id
								FROM books
								ORDER BY creation_date DESC";
	
	const INFO_BOOK_SQL = "SELECT * FROM books
								WHERE book_id = ?";
	
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	
	
	public function addBook(Book $book) {
		
		$sql = $this->db->query("SELECT * FROM books WHERE book_ISBN = ".$this->db->quote($book->isbn)."");
		if ($sql->rowCount() > 0){
			
			throw new Exception("ISBN already exists!");
			
		}else{
		
			$pstmt = $this->db->prepare ( self::ADD_NEW_BOOK_SQL );
			$pstmt->execute ( array (
					$book->isbn,
					$book->title,
					$book->author,
					$book->pages,
					$book->format,
					$book->coverImage,
					$book->resume,
					$book->publishDate,
					$book->userId
					
			) );
		
		}
	}
	
	public function listAllBooks() {
		
		$pstmt = $this->db->prepare ( self::GET_ALL_BOOKS_SQL );
		$pstmt->execute ();
		
		$books = $pstmt->fetchAll ( PDO::FETCH_ASSOC );
		$result = array ();
		
		foreach ( $books as $book ) {
			$bookForList = new Book ($book ['book_title'], $book ['book_author'], $book['book_ISBN'], $book['user_id'] ,$book['book_id']);
			$bookForList->setImage($book['book_image']);
			$bookForList->setId($book['book_id']);
			$result[]=$bookForList;
		}
		
		return $result;
	}
	
	
	
	public function infoBook($id){
	
		$pstmt = $this->db->prepare(self::INFO_BOOK_SQL);
		$pstmt->execute(array($id));
			
		$bookDetailsArr= $pstmt->fetchAll(PDO::FETCH_ASSOC);
	
		$bookDetails = $bookDetailsArr[0];
		
	
			$thisBook = new Book($bookDetails['book_title'], $bookDetails['book_author'], $bookDetails['book_ISBN'],
								$bookDetails['user_id'],$bookDetails['book_resume'],$bookDetails['book_pages'], 
								$bookDetails['book_format'], $bookDetails['publish_date']);
			
			$thisBook->setImage($bookDetails['book_image']);
			$thisBook->setCreationDate($bookDetails['creation_date']);
			$thisBook->setId($bookDetails['book_id']);
			$result = $thisBook;
		
	
		return $result;
		}
	
	
	
	
	
	
	
	public function randomName($extension){
		while(true){
			$random = sha1(rand(0,PHP_INT_MAX));
			$name = $random. "." .$extension;
			if(!file_exists($name)){
				return $name;
			}
		}
	}
	
	
}

?>