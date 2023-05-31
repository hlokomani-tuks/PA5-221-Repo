document.getElementById("signup-form").addEventListener("submit", function(event) {
    event.preventDefault() // prevent form from submitting
    
   // validateEmail();
});

function validateName() {
    var name = document.getElementById("name").value;
    // all lowercase a-Z and uppercase A-Z and 3-30 characters
    var regxName = /^[a-zA-Z]{3,20}$/;
    var errorMsg = document.getElementById("name-error");

    if(name.match(regxName)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    }

    else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';
    }
}

function validateSurname() {
    var surname = document.getElementById("surname").value;
    var regxSurname = /^[a-zA-Z]{3,20}$/;
    var errorMsg = document.getElementById("surname-error");

    if(surname.match(regxSurname)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    }

    else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';;
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    // [(username) @ (domain) . (extension)] (.extension)
    // jamie@javascript.com
    // philip5@php.co.uk
    // backward slash special character escape
    //var regxEmail = /^([a-zA-Z0-9\._]+@[a-zA-Z0-9-]+(\.[a-z]{2,4}))$/;
    var regxEmail = /^([a-zA-Z0-9\._]+@[a-zA-Z0-9-]+(\.[a-z]{2,4}))$/;
    var errorMsg = document.getElementById("email-error");

    if(email.match(regxEmail)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    }

    else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';;
    }
}

function validatePassword() {
    var password = document.getElementById("password").value;
    // var regxPassword = /^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#\$%\^&_?\*])[A-Za-z0-9\d!@#\$%\^&_?\*]{8,}$/;
    // var regxPassword = /^([\w][!@#\$%\^&\*_?]{8,})$/;
    var regxPassword = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
    var errorMsg = document.getElementById("password-error");

    if(password.match(regxPassword)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    }

    else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';;
    }
}

function confirmPassword() {
    var password = document.getElementById("password").value;
    var confirmPass = document.getElementById("confirm-password").value;
    var errorMsg = document.getElementById("confirm-password-error");

    if (confirmPass != password) {
        errorMsg.innerHTML = "Passwords do not match";
    }

    else {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    }
}

// Regex cheat sheet
/*
. :  any single character
* : preceding element zero or more times
^ :  starting position in any line
$ : ending position in any line
\d : digit
\D : non-digit character
\S : non-digit character
\s : whitespace character
\w : alphanumeric character (a-z, A-Z, 0-9)
\W : non-alphanumeric character
[] : single character contained within brackets 
() : sub-expressions
{m,n} : preceding element at least m, but no more than n times 
{2,} : 2 characters or longer
{1,8} : 1-8 character
{,3} : max 3 characters

*/