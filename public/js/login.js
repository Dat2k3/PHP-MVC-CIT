function actionLogin() {
    let actionLogin = document.getElementsByClassName('action-login')[0]
    let actionRegister = document.getElementsByClassName('action-register')[0]
    let formLogin = document.getElementsByClassName('form-login')[0]
    let formRegister = document.getElementsByClassName('form-register')[0]
    if(!actionLogin.classList.contains('activated') && formLogin.classList.contains('d-none')) {
        actionLogin.classList.add('activated')
        actionRegister.classList.remove('activated')
        formRegister.classList.add('d-none')
        formLogin.classList.remove('d-none')
    }
}

function actionRegister() {
    let actionLogin = document.getElementsByClassName('action-login')[0]
    let actionRegister = document.getElementsByClassName('action-register')[0]
    let formLogin = document.getElementsByClassName('form-login')[0]
    let formRegister = document.getElementsByClassName('form-register')[0]
    if(!actionRegister.classList.contains('activated') && formRegister.classList.contains('d-none')) {
        actionRegister.classList.add('activated')
        actionLogin.classList.remove('activated')
        formLogin.classList.add('d-none')
        formRegister.classList.remove('d-none')
    }
}

$("#login-form").on("submit", function(event) {
    let userField = document.getElementById('usertxt')
    let passField = document.getElementById('passtxt')

    let user = userField.value
    let pass = passField.value
  
    if(user == "") {
        messageErorr("login", "Please fill in your account name");
        document.getElementsByClassName('userip')[0].classList.add('empty');
        userField.focus();
        event.preventDefault();
    } 

    else if (pass == "") {
        messageErorr("login", "Please fill in your password");
        document.getElementsByClassName('passip')[0].classList.add('empty');
        passField.focus();
        event.preventDefault();
    }

    else {
        messageErorr("login", null);
        event.preventDefault();

        setTimeout(function() {
            document.getElementById("login-form").submit();
        }, 2400);
    }
});

$("#register-form").on("submit", function(event) {
    let emailField = document.getElementById('emailtxt')
    let userField = document.getElementById('newusertxt')
    let passField = document.getElementById('newpwtxt')

    let email = emailField.value
    let user = userField.value
    let pass = passField.value
  
    if (email == "") {
        messageErorr("register", "Please fill in the email address");
        document.getElementsByClassName('emailip')[0].classList.add('empty');
        emailField.focus();
        event.preventDefault();
    }

    else if(!email.includes('@')) {
        messageErorr("register", "Please fill in the email format");
        document.getElementsByClassName('emailip')[0].classList.add('empty');
        emailField.focus();
        event.preventDefault();
    } 

    else if(user == "") {
        messageErorr("register", "Please fill in the account name");
        document.getElementsByClassName('newuserip')[0].classList.add('empty');
        userField.focus();
        event.preventDefault();
    } 

    else if (pass == "") {
        messageErorr("register", "Please fill in the password");
        document.getElementsByClassName('newpwip')[0].classList.add('empty');
        passField.focus();
        event.preventDefault();
    }

    else {
        messageErorr("register", null);
        event.preventDefault();

        setTimeout(function() {
            document.getElementById("register-form").submit();
        }, 2400);
    }
});

function messageErorr(form, message) {
    let title = document.getElementsByClassName('title-message')[0]
    let content = document.getElementsByClassName('content-message')[0]
    
    if(message == null || message == undefined){
        title.innerHTML = "Success";
        if(form == "login")
            content.innerHTML = "Please wait a moment to login";
        if(form == "register") 
            content.innerHTML = "please wait a moment to register";
        submitOn();
    } 
    
    else {
        title.innerHTML = "Failed";
        content.innerHTML = message;
        submitOn();
    }
}

function submitOn() {
    let notification = document.getElementsByClassName('notification')[0]
    let progress = document.getElementsByClassName('progress')[0]


    if(!notification.classList.contains('action')) {
        notification.classList.add('action')
        progress.classList.add('action')
    }

    setTimeout(function() {
        notification.classList.remove('action')
        progress.classList.remove('action')
    }, 2000)
}

function defaultIP() {
    let userField = document.getElementsByClassName('userip')[0]
    let passField = document.getElementsByClassName('passip')[0]
    let newuserField = document.getElementsByClassName('newuserip')[0]
    let newpassField = document.getElementsByClassName('newpwip')[0]
    let newemailField = document.getElementsByClassName('emailip')[0]

    if(userField.classList.contains('empty')) {
        userField.classList.remove('empty')
    } 
    
    else if(passField.classList.contains('empty')) {
        passField.classList.remove('empty')
    }

    else if(newemailField.classList.contains('empty')) {
        newemailField.classList.remove('empty')
    }

    else if(newuserField.classList.contains('empty')) {
        newuserField.classList.remove('empty')
    }

    else if(newpassField.classList.contains('empty')) {
        newpassField.classList.remove('empty')
    }
}

let password = document.getElementById('newpwtxt')
password.addEventListener('keyup', function() {
    let pw = document.getElementById('newpwtxt').value
    document.getElementById('strength').classList.remove('d-none')
    checkStrength(pw)
})

function checkStrength(password) {
    let strength = 0;
   
    // If password contains both lower and uppercase characters
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
    }

    // If it has numbers and characters
    if (password.match(/([0-9])/)) {
        strength += 1;
    }

    // If it has one special character
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1; 
    }

    //If password is greater than 7
    if (password.length > 7) {
        strength += 1;
    }

    // If value is less than 2
    if (strength < 2) {
        document.getElementById('strength').innerHTML = "Weak!"
        document.getElementById('strength').style.color = "red"
    } else if (strength == 3) {
        document.getElementById('strength').innerHTML = "Medium!"
        document.getElementById('strength').style.color = "orange"
    } else if (strength == 4) {
        document.getElementById('strength').innerHTML = "Strong!"
        document.getElementById('strength').style.color = "#00B432"
    }
}