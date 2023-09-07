<?php 
    class home extends Controller {
        public $UserModel;
        public $PassModel;

        public function __construct() {
            $this->UserModel = $this->model("UserModel");
            $this->PassModel = $this->model("PassModel");
        }
        
        function login() {
            $user = '';
            $pass = '';
            session_start();
            if(isset($_POST["user"]) && isset($_POST["pw"])) {
                $user = $_POST["user"];
                $pass = $_POST["pw"];
                $result = $this->UserModel->SelectUser($user, $pass);
                $message = $result['error'];
                if($result['login'] == 0) {
                    $this->view("home", ["Page" => "login", "Title"  => "CIT", "message" => "$message"]);
                    $res = $this->UserModel->Information($user);
                    if($res['inf'] == 0) {
                        $_SESSION['user'] = $res['data'];
                    }
                } else if($result['login'] == 1){
                    $this->view("home", ["Page" => "login", "Title"  => "Login / Register", "error" => "$message"]);
                }
            }
            
            $this->view("home", ["Page" => "login", "Title"  =>"Login / Register"]);
        }

        function forget() {
            $email = '';
            if(isset($_POST["email"])) {
                $email = $_POST["email"];
                $result = $this->PassModel->ResetUser($email);
                $message = $result['error'];
                if($result['forget'] == 0) {
                    $this->view("home", ["Page" => "login", "Title"  => "CIT", "message" => "$message"]);
                } else if($result['forget'] == 1){
                    $this->view("home", ["Page" => "forget", "Title"  => "Forget password", "error" => "$message"]);
                }
            }
            $this->view("home", ["Page" => "forget", "Title"  =>"Forget password"]);
        }

        function newpassword($email, $token) {
            if(isset($email) && isset($token)) {
                $error = '';
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $result = $this->PassModel->check_ip_email_token($email, $token);
                if(!str_contains($email, '@')) {
                    $error = 'Email address does not exist';
                }
                else if(strlen($token) != 32 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $token)) {
                    $error = 'This is not a valid token';
                }
                
                if($error != ''){
                    $this->view("home", ["Page" => "newpassword", "Title"  =>"Change password", "email" => "user@gmail.com", "error" => $error]);
                }
                else if($result['check'] != 0) {
                    $this->view("home", ["Page" => "newpassword", "Title"  =>"Change password", "email" => "user@gmail.com", "error" => $result['error']]);
                }
                else if($result['check'] == 0){
                    $this->view("home", ["Page" => "newpassword", "Title"  =>"Change password", "email" => $email, "token" => $token, "messager" => $result['error']]);
                }
            }

        }

        function changepassword() {
            if (isset($_POST['email']) && isset($_POST['newpassword']) && isset($_POST['newpasswordrepeat'])) { 
                $email = $_POST['email'];
                $pass = $_POST['newpassword'];
                
                $result = $this->PassModel->replace_password($email, $pass);
                if($result['changepw'] == 0) {
                    $this->view("home", ["Page" => "login", "Title"  =>"Login / Register", "message" => $result['error']]);
                }
                else {
                    $this->view("home", ["Page" => "forget", "Title"  =>"Forget password", "error" => $result['error']]);
                }
            }
        }
            
        function comment() {
            $this->view("home", ["Page" => "comment", "Title"  =>"Comment"]);
        }

        function settings() {
            $this->view("home", ["Page" => "settings", "Title"  =>"Settings"]);
        }

        function exit() {
            $this->view("home", ["Page" => "home", "Title"  =>"CIT"]);
        }

        function register() {
            $email = '';
            $newuser = '';
            $newpass = '';

            if(isset($_POST["email"]) && isset($_POST["newuser"]) && isset($_POST["newpw"])) {
                $email = $_POST["email"];
                $newuser = $_POST["newuser"];
                $newpass = password_hash($_POST["newpw"], PASSWORD_DEFAULT);
                
                $rand = random_int(0, 5000);
                $token = md5($newuser . '+' . $rand);
                               
                $result = $this->UserModel->InsertNewUser($newuser, $newpass, $email, $token);
                $message = $result["error"];
                if($result['register'] == 0) {
                    $this->view("home", ["Page" => "login", "Title"  => "CIT", "message" => "$message"]);

                } else if($result['login'] == 2){
                    $this->view("home", ["Page" => "login", "Title"  => "Login / Register", "error" => "$message"]);
                }
            }
        }
    }
?>