
var userField = document.getElementById('username');

var passField = document.getElementById('pass');

var submit = document.getElementById('log-log');

var isEmpty = true;
var hasErrors = false;


submit.onclick = function (){
	
	if( userField.value =="" || passField.value ==""){

		hasErrors = true;
				
	}
	document.forms[0].onsubmit = function(event) {
		if (hasErrors) {
			event.preventDefault();
		}
	}
	
}
userField.onblur = function(){
	
	if ((userField.value.trim().length < 6)) {
	
			var container = document.getElementById("userDiv");
			var errorMessage = document.createElement('span');
			errorMessage.className = 'errorr';
			errorMessage.textContent = 'Enter 6 symbols!';
			container.appendChild(errorMessage);
			hasErrors = true;
		} else {
			hasErrors = false;
			
		}
	
};


userField.onfocus = function() {
	var errorMessage = document.querySelector("#userDiv> .errorr");
	if (errorMessage) {
		errorMessage.parentNode.removeChild(errorMessage);
		hasErrors = false;
	}
};


	passField.onblur = function(){
		
		if ((passField.value.trim().length < 6)) {
		
				var container = document.getElementById("user-pass");
				var errorMessage = document.createElement('span');
				errorMessage.className = 'errorr';
				errorMessage.textContent = 'Enter 6 symbols!';
				container.appendChild(errorMessage);
				hasErrors = true;
			} else {
				hasErrors = false;
				
			}
		
	};
	

	passField.onfocus = function() {
		var errorMessage = document.querySelector("#user-pass > .errorr");
		if (errorMessage) {
			errorMessage.parentNode.removeChild(errorMessage);
			hasErrors = false;
		}
	};
	
	
	
document.forms[0].onsubmit = function(event) {
	if (hasErrors) {
		event.preventDefault();
	}

};

