var titleField = document.getElementById('title');
var isbnField = document.getElementById('isbn');
var authorField = document.getElementById('author');
var resumeField = document.getElementById('resume');
var pagesField = document.getElementById('pages');
var pDateField = document.getElementById('pDate');
var imageField = document.getElementById('image');
var formatField = document.getElementById('format');

var submit = document.getElementById('save');



var titleError = false;
var	isbnError = false;
var authorError = false;





titleField.onblur = function(){
	
	if (titleField.value.trim().length < 3)  {
	
			var container = document.getElementById("titleDiv");
			var errorMessage = document.createElement('span');
			errorMessage.className = 'errorr';
			errorMessage.textContent = 'Books title shoud be at least 3 letters!';
			container.appendChild(errorMessage);
			titleError = true;
		} else {
			titleError = false;
			
		}
	
};

titleField.onfocus = function() {
	var errorMessage = document.querySelector("#titleDiv > .errorr");
	if (errorMessage) {
		errorMessage.parentNode.removeChild(errorMessage);
		titleError = false;
	}
};


authorField.onblur = function(){
	
	if (authorField.value.trim().length < 3)  {
	
			var container = document.getElementById("authorDiv");
			var errorMessage = document.createElement('span');
			errorMessage.className = 'errorr';
			errorMessage.textContent = 'Author shoud be at least 3 letters!';
			container.appendChild(errorMessage);
			authorError = true;
		} else {
			authorError = false;
			
		}
	
};

authorField.onfocus = function() {
	var errorMessage = document.querySelector("#authorDiv > .errorr");
	if (errorMessage) {
		errorMessage.parentNode.removeChild(errorMessage);
		authorError = false;
	}
};




function isValidISBN(isbn) {
    var re =new RegExp (/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i);
    return re.test(isbn);
}



function isExistingISBN(isbn){
		
		$.get('/checkISBNexist.php?isbn='+isbnField.value,

				function(data){
					if (data == 'true') {
						
						var container = document.getElementById("isbnDiv");
						var errorMessage = document.createElement('span');
						errorMessage.className = 'errorr';
						errorMessage.textContent = 'Existing ISBN!';
						container.appendChild(errorMessage);
					
						isbnError = true;
					} else {
						
						isbnError = false;						
					}
			
		});
		
		isbnField.onfocus = function() {
			isbnError = false;
			var errorMessage = document.querySelector("#isbnDiv > .errorr");
			if (errorMessage) {
				errorMessage.parentNode.removeChild(errorMessage);
				
			}
		};				
}


isbnField.onblur = function(){
	if(!(isValidISBN(isbnField.value))){
	
					var container = document.getElementById("isbnDiv");
					var errorMessage = document.createElement('span');
					errorMessage.className = 'errorr';
					errorMessage.textContent = 'ISBN is not valid!';
					container.appendChild(errorMessage);
					
					
					isbnError = true;
				} else {
					
					isbnError = false;
					isExistingISBN(isbnField.value);
									
				}
		
};
	
	isbnField.onfocus = function() {
		isbnError = false;
		var errorMessage = document.querySelector("#isbnDiv > .errorr");
		if (errorMessage) {
			errorMessage.parentNode.removeChild(errorMessage);
			
		}
	};
	
	
	
	
	document.forms[0].onsubmit = function(event) {
		
		if ((isbnError)|| (titleError) || (authorError) ){
					
			event.preventDefault();
		}
	
		
};