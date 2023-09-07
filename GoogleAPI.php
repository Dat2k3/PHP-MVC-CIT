<?php 
    // Call API Google 
    require_once './config/config.php';
   
    // // Call Database MySQL
    require_once './mvc/core/Database.php';

    $url_home = "http://" . $_SERVER['HTTP_HOST'] . "/PHP-MVC-CIT/home/main"; 
    $url_login = "http://" . $_SERVER['HTTP_HOST'] . "/PHP-MVC-CIT/home/login"; 

    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
 
        // Get profile info
        $google_oauth = new Google\Service\Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;
        $picture = $google_account_info->picture;
        $result = addInfor($email, $name, $picture);
        if($result['user'] == 0 || $result['user'] == 1) {
            header("Location: $url_home");
        } else {
            header("Location: $url_login");
        }
    } else {
        require_once './mvc/views/pages/login.php';
    }

    function addInfor($email, $name, $picture) {
        if(is_email_exist($email)) {
            return array('user' => 1, 'error' => 'Account already exists');
        }

        $sql = "insert into users (email, name, picture) values (?,?,?)";
        $conn = connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('sss', $email, $name, $picture);
        
        if(!$stm->execute()) {
            return array('user' => 2, 'error' => 'Can not execute command');
        }

        return array('user' => 0, 'error' => 'Update data successful');
    }

    function is_email_exist($email) {
        $sql = "select * from users where email = ?";
        $conn = connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $email);

        if(!$stm->execute()) {
           die("Query error: " . $stm->error);
        }

        $result = $stm->get_result();

        // User has existed
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
?>