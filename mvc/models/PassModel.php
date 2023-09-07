<?php 
    require_once './mvc/core/Database.php';
    require_once './public/phpmailer/vendor/autoload.php';
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    class PassModel {
        function ResetUser($email) {
            if(!$this->is_email_exist($email)) {
                return array('forget' => 1, 'error' => 'Account not exist');
            }
    
            $token = md5($email .'+'. random_int(1000, 2000));
            $sql = "update reset_token set token = ? where email = ?";
            
            $conn = connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ss', $token, $email);
    
            if(!$stm->execute()) {
                return array('forget' => 2, 'error' => 'Can not execute command');
            }
    
            // There are empty table in database (row)
            if($stm->affected_rows == 0) {
                $exp = time() + 3600*24; // dealine 24h
                
                $sql = 'insert into reset_token values (?,?,?)';
                $stm = $conn->prepare($sql);
                $stm->bind_param('ssi', $email, $token, $exp);
    
                if(!$stm->execute()) {
                    return array('forget' => 2, 'error' => 'Can not execute command');
                }
            }
            
            $this->send_password($email, $token);
            return array('forget' => 0, 'error' => 'Please check your email');
        }

        function Activate($email) {
            $sql = "select activate_token from account where email = ?";
            $conn = connection();

            $stm = $conn->prepare($sql);
            $stm->bind_param('s', $email);

            if(!$stm->execute()) {
                die("Query error: " . $stm->error);
            }

            $result = $stm->get_result();
            $data = $result->fetch_assoc();

            // Email not exist
            if($result->num_rows > 0) {
                $this->send($email, $data['activate_token']);
            }
        }

        function is_email_exist($email) {
            $sql = "select username from account where email = ?";
            $conn = connection();
    
            $stm = $conn->prepare($sql);
            $stm->bind_param('s', $email);
    
            if(!$stm->execute()) {
               die("Query error: " . $stm->error);
            }
    
            $result = $stm->get_result();
    
            // User not exist
            if($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }

        function is_token_exist($token) {
            $sql = "select email from reset_token where token = ?";
            $conn = connection();
    
            $stm = $conn->prepare($sql);
            $stm->bind_param('s', $token);
    
            if(!$stm->execute()) {
               die("Query error: " . $stm->error);
            }
    
            $result = $stm->get_result();
    
            // User not exist
            if($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }

        function check_ip_email_token($email, $token) {
            if(!$this->is_email_exist($email)) {
                return array('check' => 1, 'error' => 'Account not exist');
            }

            else if(!$this->is_token_exist($token)) {
                return array('check' => 1, 'error' => 'Token not exist');
            }

            return array('check' => 0, 'error' => 'Token and Email are valid');

        }

        function replace_password($email, $pass) {
            $sql = 'update account set password = ? where email = ?';
            $hash = password_hash($pass, PASSWORD_DEFAULT);
    
            $conn = connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ss',$hash, $email);
    
            if(!$stm->execute()) {
                return array('changepw' => 2, 'error' => 'Can not execute command');
            }
    
            return array('changepw' => 0, 'error' => 'Password reset successful');
        }

        function send($email, $token) {
            $server_host = $_SERVER['HTTP_HOST'];
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();                                            //Send using SMTP
                $mail->CharSet = 'UTF-8';
                $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'phamvantiendat2@gmail.com';            //SMTP username
                $mail->Password   = 'zdudmtloxjzikhkw';                     //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('phamvantiendat2@gmail.com', 'CIT');
                $mail->addAddress($email, "Dear Customer,");                //Add a recipient
    
                //Content
                $mail->isHTML(true);                                    //Set email format to HTML
                $mail->Subject = 'Account confirmation for you';
                $mail->Body    = "
                <div style=' 
                        margin: auto;
                        width: 500px;
                        background-color: white;
                        border-radius: 10px;
                        padding: 40px;'>
                    <h3>Hello!</h3>
                    <p style='margin-bottom: 25px;'>Please click the button below to activate your account</p>
                    <a href='http://$server_host/PHP-MVC-CIT/home/newpassword/$email/$token' style='
                        text-decoration: none;
                        color: white;
                        font-weight: bold;
                        font-size: 14px;
                        padding: 13px;
                        border: none;
                        border-radius: 5px;
                        background-color: #2AA9E0;'>
                    Activate</a>
                </div>";
                $mail->send();
                return true;   
            } 
            catch (Exception $e) {
                return false;
            }
        }

        function send_password($email, $token) {
            $server_host = $_SERVER['HTTP_HOST'];
            $mail = new PHPMailer(true);
    
            try {
                $mail->isSMTP();         
                $mail->CharSet    = 'utf-8';                                // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'phamvantiendat2@gmail.com';            // SMTP username
                $mail->Password   = 'zdudmtloxjzikhkw';                     // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable implicit TLS encryption
                $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('phamvantiendat2@gmail.com', 'CIT');
                $mail->addAddress($email, "Dear Customer,");                    // Add a recipient
    
                //Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = 'Password Recovery';
                $mail->Body    = "
                <div style=' 
                        margin: auto;
                        width: 500px;
                        background-color: white;
                        border-radius: 10px;
                        padding: 40px;'>
                    <h3>Hello!</h3>
                    <p style='margin-bottom: 25px;'>Please click the button below to recover your password</p>
                    <a href='http://$server_host/PHP-MVC-CIT/home/newpassword/$email/$token' style='
                        text-decoration: none;
                        color: white;
                        font-weight: bold;
                        font-size: 14px;
                        padding: 13px;
                        border: none;
                        border-radius: 5px;
                        background-color: #2AA9E0;'>
                    Recover password</a>
                </div>";
                
                $mail->send();
                return true;   
            } 
            catch (Exception $e) {
                return false;
            }
        }
    }   
?>