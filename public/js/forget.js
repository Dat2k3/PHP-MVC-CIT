$("#forget-form").on("submit", function(event) {
    let emailReset = document.getElementById('email-reset')
    let email = emailReset.value
    
    if (email == "") {
        messageErorr("Please fill in the email address");
        document.getElementsByClassName('email-resetip')[0].classList.add('empty');
        emailReset.focus();
        event.preventDefault();
    }

    else if(!email.includes('@')) {
        messageErorr("Please fill in the email format");
        document.getElementsByClassName('email-resetip')[0].classList.add('empty');
        emailReset.focus();
        event.preventDefault();
    } 

    else {
        messageErorr(null);
        event.preventDefault();

        setTimeout(function() {
            document.getElementById("forget-form").submit();
        }, 2400);
    }
});

function messageErorr(message) {
    let title = document.getElementsByClassName('title-message')[0]
    let content = document.getElementsByClassName('content-message')[0]
    
    if(message == null || message == undefined){
        title.innerHTML = "Success";
        content.innerHTML = "Please check your email to reset a new password";
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
    }, 2400)
}

function defaultIP() {
    let emailField = document.getElementsByClassName('email-resetip')[0]

    if(emailField.classList.contains('empty')) {
        emailField.classList.remove('empty')
    } 
}