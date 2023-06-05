function signUp(){
    var allValid = false;
    var SubmitButton = document.getElementById("submit");
    SubmitButton.style.display = "none";

    var fnb = validateInput(document.getElementById("fname").value);
    var lnb = validateInput(document.getElementById("lname").value);
    var unb = validateInput(document.getElementById("uname").value);
    var emb = validateEmail(document.getElementById("email").value);
    var pwb = validatePassword(document.getElementById("password").value);

    if(!fnb){
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "First Name cannot be empty. ";
    }
    if(!lnb){
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "Last Name cannot be empty. ";
    }
    if(!unb){
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "Username cannot be empty. ";
    }
    if(!emb){
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "Invalid Email. ";
    }
    if(!pwb){
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "Invalid Password. ";
    }

    if(fnb&&lnb&&unb&&emb&&pwb){
        allValid = true;
        document.getElementById("error").innerHTML = "";
    }

    if(allValid) SubmitButton.style.display = "";
    else SubmitButton.style.display = "none";
}

function logIn(){
    var allValid = false;
    var SubmitButton = document.getElementById("submit");
    SubmitButton.style.display = "none";

    var emb = validateEmail(document.getElementById("email").value);
    var pwb = validatePassword(document.getElementById("password").value);

    if(!emb) {
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "Invalid Email. ";
    }

    if(!pwb){
        allValid = false;
        document.getElementById("error").innerHTML = "Invalid Fields";
        //document.getElementById("error").innerHTML += "Invalid Password. ";
    }

    if(emb&&pwb){
        allValid = true;
        document.getElementById("error").innerHTML = "";
    }

    if(allValid) SubmitButton.style.display = "";
    else SubmitButton.style.display = "none";
    
    if(allValid) SubmitButton.style.display = "";
    else SubmitButton.style.display = "none";

    let headersList = {
        "Content-Type": "application/json"
    }
    
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    
    let bodyContent = JSON.stringify({
        "email": email,
        "password": password
    });
    
    let response = await fetch("http://127.0.0.1/validate_login.php", { 
        method: "POST",
        body: bodyContent,
        headers: headersList
    });
    
    
    if(response.ok)
    {
        let data = await response.text();
        console.log(data);
        window.location.href = "index.php";
    }
    else
    {
        let errorData = await response.text();
        console.log("Not allowed to login. Error:", errorData);

    }
}

function validateEmail(email){
    var validEmailExp = /^[A-Za-z0-9._%+-]{1,64}@(?:[A-Za-z0-9-]{1,63}\.){1,125}[A-Za-z]{2,63}/;
    return validEmailExp.test(email);
}

function validatePassword(password){
    var validPasswordExp = /(?=(((\w)*([A-Z])+(\w)*(\W)+(\w)*([0-9])+)|((\w)*(\W)+(\w)*([0-9])(\w)*([A-Z])+)|((\w)*([0-9])+(\w)*([A-Z])+(\w)*(\W)+)|((\w)*([A-Z])+(\w)*([0-9])+(\w)*(\W)+)|((\w)*([0-9])+(\w)*(\W)+(\w)*([A-Z])+)|((\w)*(\W)+(\w)*([A-Z])+(\w)*([0-9])+)))(?=.{8,})/;
    return validPasswordExp.test(password);
}

function validateInput(input){
    var validInputExp = /.{1,}/;
    return validInputExp.test(input);
}
