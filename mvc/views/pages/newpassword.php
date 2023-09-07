<?php 
    $server_host = "http://" . $_SERVER['HTTP_HOST'];
    $url = $server_host . "/PHP-MVC-CIT/public/";
?>

<head>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="../public/css/login.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= $url ?>css/login.css">
</head>

<body>
    <div class="box-newpw">
        <form id="newpw-form" method="POST" action="../../changepassword">
            <div class="form-newpw">
                <div class="email">
                    <p>Email</p>
                    <input class="email-confirmip disable" id="email-confirm" type="text" name="email" value="<?= $data['email'] ?>">
                </div>

                <div class="newpassword">
                    <p>Password</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="newpwip" id="newpwtxt" type="text" name="newpassword"  placeholder="Enter new password">
                </div>

                <div class="newpassword">
                    <p>Confirm password</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="newpwrepeatip" id="newpwrepeattxt" type="text" name="newpasswordrepeat"  placeholder="Confirm password">
                </div>

                <button type="submit">CHANGE PASSWORD</button>
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
<script src="<?= $url ?>js/newpassword.js"></script>