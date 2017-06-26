
function createBookDiv(book) {

	
	var bookDivSecond = document.createElement('div');
	bookDivSecond.className = "onebook";
	

	var bookImgDiv = document.createElement('div');
	bookImgDiv.className = "one-fifth";
	var bookImg = document.createElement('img');
	bookImg.src = "http://localhost/WapiLibrary/assets/cover/"+book.coverImage;
	bookImg.alt = "Picture";
	bookImgDiv.appendChild(bookImg);
	
	var bookTitleDiv = document.createElement('div');
	var bookTitleH3 = document.createElement('H3');
	bookTitleDiv.className = "one-fifth";
	bookTitleDiv.appendChild(bookTitleH3);
	bookTitleH3.innerHTML = "Title: " +book.title;
	
	var bookAuthorDiv = document.createElement('div');
	var bookAuthorSpan = document.createElement('span');
	bookAuthorDiv.className = "one-fifth";
	bookAuthorDiv.appendChild(bookAuthorSpan);
	bookAuthorSpan.innerHTML = " Author: " + book.author;
	
	
	var bookA = document.createElement('a');
	bookA.className = "link-for-info-book";
	bookA.href = "http:/BooksController.php?id="+book.id;
	bookDivSecond.appendChild(bookA);
	
	
	bookA.appendChild(bookImgDiv);
	bookA.appendChild(bookTitleDiv);
	bookA.appendChild(bookAuthorDiv);

	
	var bookDivFirst = document.getElementById('result');
	bookDivFirst.appendChild(bookDivSecond);
	
}




	

function listAllBooks() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET','/ajaxControllerBooksList.php', true);

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			var data = JSON.parse(xhr.responseText);
			
			var allBooksHeadline = document.createElement('div');
			allBooksHeadline.className = "headline";
			

			var headlineH2 = document.createElement('H2');
			headlineH2.innerHTML = "Books List";
			  var bookDivFirst = document.getElementById('result');
			  bookDivFirst.appendChild(headlineH2);
			
		
			for (var i = 0; i < data.length; i++) {
				console.log(data[i]);
				createBookDiv(data[i]);

			}

	
		}
	}

	xhr.send(null);
}

