$("#newpw-form").on("submit", function(event) {
    let emailConfirmField = document.getElementById('email-confirm')
    let newpwField = document.getElementById('newpwtxt')
    let newpwRepeatField = document.getElementById('newpwrepeattxt')

    let emailConfirm = emailConfirmField.value
    let newpw = newpwField.value
    let newpwRepeat = newpwRepeatField.value

    if (emailConfirm == "") {
        messageErorr("Please fill in the email address");
        document.getElementsByClassName('email-confirmip')[0].classList.add('empty');
        emailConfirmField.focus();
        event.preventDefault();
    }

    else if(!emailConfirm.includes('@')) {
        messageErorr("Please fill in the email format");
        document.getElementsByClassName('email-confirmip')[0].classList.add('empty');
        emailConfirmField.focus();
        event.preventDefault();
    }

    else if (newpw == "") {
        messageErorr("Please fill in the new password");
        document.getElementsByClassName('newpwip')[0].classList.add('empty');
        newpwField.focus();
        event.preventDefault();
    }

    else if (newpwRepeat == "") {
        messageErorr("Please fill in the new password again");
        document.getElementsByClassName('newpwrepeatip')[0].classList.add('empty');
        newpwRepeatField.focus();
        event.preventDefault();
    }

    else {
        if(newpw === newpwRepeat) {
            messageErorr(null);
            event.preventDefault();
            setTimeout(function() {
                document.getElementById("newpw-form").submit();
            }, 2400);
        } else {
            messageErorr("Confirm password does not match");
            document.getElementsByClassName('newpwrepeatip')[0].classList.add('empty');
            newpwRepeatField.focus();
            event.preventDefault();
        }
    }
});

function messageErorr(message) {
    let title = document.getElementsByClassName('title-message')[0]
    let content = document.getElementsByClassName('content-message')[0]

    if(message == null || message == undefined){
        title.innerHTML = "Success";
        content.innerHTML = "You have successfully changed your password";
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
    let emailConfirmField = document.getElementsByClassName('email-confirmip')[0]
    let newpwField = document.getElementsByClassName('newpwip')[0]
    let newpwRepeatField = document.getElementsByClassName('newpwrepeatip')[0]

    if(emailConfirmField.classList.contains('empty')) {
        emailConfirmField.classList.remove('empty')
    }

    if(newpwField.classList.contains('empty')) {
        newpwField.classList.remove('empty')
    }

    if(newpwRepeatField.classList.contains('empty')) {
        newpwRepeatField.classList.remove('empty')
    }
}