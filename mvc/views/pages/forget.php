<?php 
    $server_host = "http://" . $_SERVER['HTTP_HOST'];
    $url = $server_host . "/PHP-MVC-CIT/public/";
?>

<head>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?= $url ?>css/login.css">
</head>

<body>
    <div class="box-forget">
        <form id="forget-form" action="../home/forget" method="POST">
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
<script src="<?= $url ?>js/forget.js"></script>