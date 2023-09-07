<?php 
    require_once './mvc/core/Database.php';    

    class UserModel {
         function InsertNewUser($username, $password, $email, $token) {
            $sql = "insert into account (username, password, email, activate_token) values (?,?,?,?)";
            $conn = connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ssss', $username, $password, $email, $token);

            if(!$stm->execute()) {
                return array('register' => 2, 'error' => 'Can not execute command');
            }
           
            return array('register' => 0, 'error' => 'Successful register');
        }

        function SelectUser($username, $password) {
            $sql = "select * from account where username = ?";
            $conn = connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('s', $username);

            if(!$stm->execute()) {
                return array('login' => 2, 'error' => 'Can not execute command');
            }
            
            $result = $stm->get_result();
            if($result->num_rows == 0) {
                return array('login' => 1, 'error' => 'Account does not exist');
            }

            $data = $result->fetch_assoc();
            $hashed_password = $data['password'];
            if(!password_verify($password, $hashed_password)) {
                return array('login' => 1, 'error' => "Incorrect password");
            }
    
            else return array('login' => 0, 'error' => "Successful login");
        }

        function Information($user) {
            $sql = "select name from users u, account a where u.email = a.email and a.username = ?";
            $conn = connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('s', $user);

            if(!$stm->execute()) {
                return array('inf' => 2, 'error' => 'Can not execute command');
            }
            
            $result = $stm->get_result();
            $data = $result->fetch_assoc();

            if($result->num_rows < 0) {
                return array('inf' => 1, 'error' => 'Users does not update');
            }
 
            return array('inf' => 0, 'error' => "Successful connect", 'data' => $data['name']);
        }
    }   
?>