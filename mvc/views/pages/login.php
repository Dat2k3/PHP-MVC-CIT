<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <div class="box">
        <div class="action-box">
            <div onclick="actionRegister()" class="action action-register">REGISTER</div>
            <div onclick="actionLogin()" class="action action-login activated">LOG IN</div>
        </div>
    
        <form id="login-form" action="">
            <div class="form-login">
                <div class="username">
                    <p>Username</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="userip" id="usertxt" type="text" name="user" placeholder="Username">
                </div>
            
                <div class="password">
                    <p>Password</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="passip" id="passtxt" type="password" name="pw" placeholder="Password">
                    
                    <div class="forgot">
                        <a href="forget">Forgot password?</a>
                    </div>
                </div>

                <button type="submit">LOGIN TO ACCOUNT</button>

                <h2 class="hr-lines">OR</h2>

                <button id="gg-login" type="submit">
                    <div class="gg-icon gg-bg">
                        <img src="../public/document/image/logo-icon/Glogo 1.png" alt="google">
                    </div>
                    <p>Sign in with Google</p>
                </button>
            </div>
        </form>

        <form id="register-form" action="">
            <div class="d-none form-register">
                <div class="email">
                    <p>Email</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="emailip" id="emailtxt" type="text" name="email"  placeholder="Address email">
                </div>

                <div class="username">
                    <p>Username</p>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="newuserip" id="newusertxt" type="text" name="newuser"  placeholder="Account name">
                </div>
            
                <div class="password">
                    <div class="title-pw">
                        <p>Password</p>
                        <div class="d-none message" id="strength">
                            Strong!
                        </div>
                    </div>
                    <input onclick="defaultIP()" onkeypress="defaultIP()" class="newpwip" id="newpwtxt" type="text" name="newpw" placeholder="New password">
                    <p class="hint-pw">Hint: Password must be at least 8 characters long, one uppercase with one lowercase, and one numeric (can have one special character)</p>
                </div>

                <button type="submit">SIGN UP</button>
                <p class="connect-login">Have an account?<a href="login">&nbspLogin</a></p>
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
<script src="../public/js/login.js"></script>
</html>