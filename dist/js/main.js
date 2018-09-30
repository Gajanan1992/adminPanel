function validateForm() {
	var x = document.forms["loginform"]["username"].value;
	var y = document.forms["loginform"]["password"].value;
	
    if (x != "admin" || ) {
        alert("Enter correct username and Password");
        return false;
    }
	}