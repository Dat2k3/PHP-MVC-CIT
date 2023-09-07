<?php
    $server_host = "http://" . $_SERVER['HTTP_HOST'];
    $url = $server_host . "/PHP-MVC-CIT/public/";
    $customer = '';
    if(isset($_SESSION['user'])) {
        $customer = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Mobile, Web, Desktop, and DevOps Developer">
    <link rel="icon" type="image/x-icon" href="<?= $url ?>document/image/logo-icon/icon-cit-rmbg.ico">
    <link rel="stylesheet" type="text/css" href="<?= $url ?>css/home.css">
    <!-- <link rel="stylesheet" href="../public/css/home.css"> -->
    <script src="<?= $url ?>js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= $data["Title"] ?></title>
</head>

<style>
    .swal-wide{
        width: 400px !important;
    }
</style>

<head>
    <div class="nav">
        <img class="bigLogo" src="<?= $url ?>document/image/logo-icon/icon-logo-rmbg.png" alt="logoCIT">
        <div class="nav-list">
            <div class="nav-item">HOME</div>
            <div class="nav-item">PORTFOLIO</div>
            <div class="nav-item">CONTACT</div>
            <div class="nav-item">ABOUT</div>
            <div onclick="menuBar()" class="nav-item" id="menu">
                <img id="img-menu" src="<?= $url ?>document/image/logo-icon/menu.svg" alt="menu">
            </div>
        </div>
    </div>
    
    <div class="d-none menu-list">
        <a class="menu-item login" href="../home/login">
            <img class="icon-menu" src="<?= $url ?>document/image/logo-icon/icon_user.svg" alt="user">
            <div class="label-menu">Login</div>
        </a>
    
        <a class="menu-item register" href="">
            <img class="icon-menu" src="<?= $url ?>document/image/logo-icon/icon_elements.svg" alt="register">
            <div class="label-menu">Comment</div>
        </a>
        
        <a class="menu-item settings" href="">
            <img class="icon-menu" src="<?= $url ?>document/image/logo-icon/icon_settings.svg" alt="settings">
            <div class="label-menu">Settings</div>
        </a>
       
        <a class="menu-item exit" href="">
            <img class="icon-menu" src="<?= $url ?>document/image/logo-icon/icon_arrow.svg" alt="exit">
            <div class="label-menu">Exit</div>
        </a>
    </div>
</head>

<body>
    <p>Hello <?= $customer?>!</p>
    <div>
        <?php
            if($data["Page"] == "home")
                require_once './mvc/views/home.php';
            else
                require_once './mvc/views/pages/' .$data["Page"]. '.php';
        ?>

        <?php 
            if(isset($data["message"])) {
        ?>

            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '<?= $data["message"] ?>',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 1200
                })
            </script>        
        <?php
            } if(isset($data["error"])) {
        ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: '<?= $data["error"] ?>',
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 1200
                })
            </script>      
        <?php 
            }
        ?>
    </div>
</body>
</html>