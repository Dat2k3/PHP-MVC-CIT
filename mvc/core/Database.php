<?php 
    define('host','127.0.0.1');
    define('user','root');
    define('pass','');
    define('db','cit');

    function connection() {
        $conn = new mysqli(host, user, pass, db);
        if($conn->connect_error) {
            die('Connect-error: ' . $conn->connect_error);
        }
        return $conn;
    }
?>