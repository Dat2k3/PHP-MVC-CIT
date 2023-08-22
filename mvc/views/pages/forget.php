<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <div class="box-forget">
        <form id="forget-form" action="">
            <div class="form-forget">
                <div class="email">
                    <p>Email</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="email-resetip" id="email-reset" type="text" name="email" placeholder="Email address">
                </div>

                <button type="submit">RESET PASSWORD</button>
            </div>
        </form>
    </div>

    <div class="notification">
        <div class="notification-content">
            <div class="message">
                <span class="title-message">Success</span>
                <span class="content-message"></span>
            </div>
        </div>

        <div class="progress"></div>
    </div>
</body>
<script src="../public/js/forget.js"></script>
</html>