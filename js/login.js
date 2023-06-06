document.getElementById("login-form").addEventListener("submit", async function(event) {
    event.preventDefault() // prevent form from submitting

    let headersList = {
        "Content-Type": "application/json"
    }

    let bodyContent = JSON.stringify({
        "email": $("#email").val(),
        "password": $("#password").val()
    });

    let response = await fetch("http://localhost/validate_login.php", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = JSON.parse(await response.text());

    let error = $("#error")
    switch (data.response) {
        case "not_registered":
            error.html("You are not registered user, click 'Sign up' below")
            break;
        case "wrong_password":
            error.html("Password is not correct")
            break;
        case "succesful":
            window.location.href = "http://localhost/index.php"
            break;
    }
})


function validateEmail() {
    var validEmailExp = /^[A-Za-z0-9._%+-]{1,64}@(?:[A-Za-z0-9-]{1,63}\.){1,125}[A-Za-z]{2,63}/;

    if (!validEmailExp.test($("#email").val()))
        $("#error").html("Email is invalid")
    else 
        $("#error").html("")
}

function validatePassword() {
    var validPasswordExp = /(?=(((\w)*([A-Z])+(\w)*(\W)+(\w)*([0-9])+)|((\w)*(\W)+(\w)*([0-9])(\w)*([A-Z])+)|((\w)*([0-9])+(\w)*([A-Z])+(\w)*(\W)+)|((\w)*([A-Z])+(\w)*([0-9])+(\w)*(\W)+)|((\w)*([0-9])+(\w)*(\W)+(\w)*([A-Z])+)|((\w)*(\W)+(\w)*([A-Z])+(\w)*([0-9])+)))(?=.{8,})/;

    if (!validPasswordExp.test($("#password").val()))
        $("#error").html("Password is invalid")
    else 
        $("#error").html("")
}