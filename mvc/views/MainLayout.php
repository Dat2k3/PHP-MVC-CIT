<?php
    //require_once 'indexModel.php';

    // if(isset($_GET['lang'])) {
    //     $language = $_GET['lang'];
    //     if($language == 'en')
    //         $projects = get_projects("english");
    //     if($language == 'vi')
    //         $projects = get_projects("vietnamese");
    // } 
    // else {
    //     $projects = get_projects("english");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIT Team</title>
    <link rel="stylesheet" href="Components/component.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<head>
    <div class="header">
        <div class="header__nav">
            <div class="header__nav">
                <ul class="header__nav__nav-list">
                    <li class="header__nav__nav-list__nav-item">
                        <a href="../index.php"><img src="../Components/image/logo_removebg.png" width="100px" alt="Personal Logo"></a>
                    </li>
    
                    <li class="header__nav__nav-list__nav-item profile-name">
                        <h4 style="font-size: 20px;">CIT</h4>
                        <p><small style="font-size: 16px;">Software Engineering</small></p>
                    </li>
                </ul>
            </div>

            <div class="header__nav">
                <form action="" method="post">
                    <ul class="header__nav__nav-list english">
                        <li class="header__nav__nav-list__nav-item controller"><a href="../index.php">Home</a></li>
                        <li class="header__nav__nav-list__nav-item controller"><a href="#">Portfolio</a></li>
                        <li class="header__nav__nav-list__nav-item controller"><a href="#">Source</a></li>
                        <li class="header__nav__nav-list__nav-item controller" id="header__nav__nav-list__nav-item__btn-controller"><a href="#">About us</a></li>
                        <li class="header__nav__nav-list__nav-item controller"><a onclick="clickLanguage()" href="index.php?lang=vi">
                            <span class="material-symbols-outlined">bring_your_own_ip<sub id="language">EN</sub></span>
                        </a></li>
                    </ul>

                    <ul class="header__nav__nav-list vietnamese d-none">
                        <li class="header__nav__nav-list__nav-item controller"><a href="../index.php">Trang chủ</a></li>
                        <li class="header__nav__nav-list__nav-item controller"><a href="#">Dự án</a></li>
                        <li class="header__nav__nav-list__nav-item controller"><a href="#">Source</a></li>
                        <li class="header__nav__nav-list__nav-item controller" id="header__nav__nav-list__nav-item__btn-controller"><a href="#">Liên hệ</a></li>
                        <li class="header__nav__nav-list__nav-item controller"><a onclick="clickLanguage()" href="index.php?lang=en">
                            <span class="material-symbols-outlined">bring_your_own_ip<sub id="language">VI</sub></span>
                        </a></li>
                    </ul>
                </form>
    
                <ul class="header__nav__nav-list">
                    <li class="header__nav__nav-list__nav-item controller-icon"><a href="../index.php"><span class="material-symbols-outlined">home</span></a></li>
                    <li class="header__nav__nav-list__nav-item controller-icon"><a href="#"><span class="material-symbols-outlined">bookmark_manager</span></a></li>
                    <li class="header__nav__nav-list__nav-item controller-icon"><a href="#"><span class="material-symbols-outlined">deployed_code</span></a></li> 
                    <li class="header__nav__nav-list__nav-item controller-icon"><a href="#"><span class="material-symbols-outlined">person</span></a></li>                       
                </ul>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="container english">
        <h1 id="container__title-page">PORTFOLIO</h1>
        <?php 
            foreach($projects as $pro) {
        ?>
        <div class="container__project">
            <div class="container__project__description">
                <h2 id="project-title"><?= $pro['name'] ?></h2>
                <p style="font-style: italic;"><?= $pro['subheading'] ?></p>
                <p><?= $pro['description'] ?></p>
                <a href="">
                    <p id="detail">Detail</p>
                </a>
            </div>
            <div class="container__project__illustrate" style="background-image: url(Components/image/<?= $pro['image'] ?>);"></div>
        </div>
        <?php
            }
        ?>
    </div>

    <div class="container vietnamese d-none">
        <h1 id="container__title-page">DỰ ÁN CIT</h1>
        <?php 
            foreach($projects as $pro) {
        ?>
        <div class="container__project">
            <div class="container__project__description">
                <h2 id="project-title"><?= $pro['name'] ?></h2>
                <p style="font-style: italic;"><?= $pro['subheading'] ?></p>
                <p><?= $pro['description'] ?></p>
                <a href="">
                    <p id="detail">Chi tiết</p>
                </a>
            </div>
            <div class="container__project__illustrate" style="background-image: url(Components/image/<?= $pro['image'] ?>);"></div>
        </div>
        <?php
            }
        ?>
    </div>
</body>

<footer>
    <div class="footer part_1">
        <div class="header__nav">
            <ul class="header__nav__nav-list">
                <li class="header__nav__nav-list__nav-item icon-footer margin_footer"><a href="#"><span class="material-symbols-outlined">location_on</span></a></li>
                <li class="header__nav__nav-list__nav-item title-footer">
                    <h6 style="font-size: 18px;">Find Us</h6>
                    <p><small style="font-size: 15px;">TDT Uninersity</small></p>
                </li>

                <li class="header__nav__nav-list__nav-item icon-footer margin_footer"><a href="#"><span class="material-symbols-outlined">phone_in_talk</span></a></li>
                <li class="header__nav__nav-list__nav-item title-footer">
                    <h6 style="font-size: 18px;">Call Us</h6>
                    <p><small style="font-size: 15px;">039479****</small></p>
                </li>

                <li class="header__nav__nav-list__nav-item icon-footer margin_footer"><a href="#"><span class="material-symbols-outlined">drafts</span></a></li>
                <li class="header__nav__nav-list__nav-item title-footer">
                    <h6 style="font-size: 18px;">Mail Us</h6>
                    <p><small style="font-size: 15px;">phamvantiendat2@gmail.com</small></p>
                </li>
            </ul>
        </div>
    </div>

    <hr>
    <div class="footer part_2 english">
        <div class="header__nav" style="width: 60%;">
            <ul class="header__nav__nav-list">
                <li class="header__nav__nav-list__nav-item">
                    <a href="../index.php"><img src="../Components/image/logo_removebg.png" width="100px" alt="Personal Logo"></a>
                </li>  
                <br>

                <li class="header__nav__nav-list__nav-item title-footer" id="content-team">
                    <p>
                        <small style="font-size: 15px;">CIT Team was established in May 2023, where the team shares documents stored after each school year at TDTU, where you can consult, get ideas, and download our code for learning purposes practice.</small>
                    </p>
                </li>
                <br>
            </ul>
        </div>

        <div class="header__nav" style="width: 40%;">
            <ul class="header__nav__nav-list">
                <li class="header__nav__nav-list__nav-item title-footer margin_footer">
                    <h6 style="font-size: 18px;">Follow Us</h6>
                </li>
                <br>

                <li class="header__nav__nav-list__nav-item icon-contact margin_contact"><a href="#"><i class="bi bi-facebook"></i></a></li>
                <li class="header__nav__nav-list__nav-item icon-contact margin_contact"><a href="#"><i class="bi bi-messenger"></i></a></li>
                <li class="header__nav__nav-list__nav-item icon-contact margin_contact"><a href="#"><i class="bi bi-github"></i></a></li>
                <br>

                <li class="header__nav__nav-list__nav-item title-footer margin_footer">
                    <h6 style="font-size: 18px;">Useful Links</h6>
                </li>
                <br>

                <li class="header__nav__nav-list__nav-item link-footer margin_contact">
                    <a href="../index.php"><p><small style="font-size: 15px;">Home</small></p></a>
                    <a href=""><p><small style="font-size: 15px;">Portfolio</small></p></a>
                </li>

                <li class="header__nav__nav-list__nav-item link-footer margin_contact">
                    <a href=""><p><small style="font-size: 15px;">Source</small></p></a>
                    <a href=""><p><small style="font-size: 15px;">Contact</small></p></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer part_2 vietnamese d-none">
        <div class="header__nav" style="width: 60%;">
            <ul class="header__nav__nav-list">
                <li class="header__nav__nav-list__nav-item">
                    <a href="../index.php"><img src="../Components/image/logo_removebg.png" width="100px" alt="Personal Logo"></a>
                </li>  
                <br>

                <li class="header__nav__nav-list__nav-item title-footer" id="content-team">
                    <p>
                        <small style="font-size: 15px;">CIT Team được thành lập vào tháng 5 năm 2023, là nơi chia sẻ tài liệu lưu trữ sau mỗi năm học tại TDTU, nơi bạn có thể tham khảo, lấy ý tưởng và tải code của chúng tôi phục vụ cho mục đích học tập và thực hành.</small>
                    </p>
                </li>
                <br>
            </ul>
        </div>

        <div class="header__nav" style="width: 40%;">
            <ul class="header__nav__nav-list">
                <li class="header__nav__nav-list__nav-item title-footer margin_footer">
                    <h6 style="font-size: 18px;">Follow Us</h6>
                </li>
                <br>

                <li class="header__nav__nav-list__nav-item icon-contact margin_contact"><a href="#"><i class="bi bi-facebook"></i></a></li>
                <li class="header__nav__nav-list__nav-item icon-contact margin_contact"><a href="#"><i class="bi bi-messenger"></i></a></li>
                <li class="header__nav__nav-list__nav-item icon-contact margin_contact"><a href="#"><i class="bi bi-github"></i></a></li>
                <br>

                <li class="header__nav__nav-list__nav-item title-footer margin_footer">
                    <h6 style="font-size: 18px;">Useful Links</h6>
                </li>
                <br>

                <li class="header__nav__nav-list__nav-item link-footer margin_contact">
                    <a href="../index.php"><p><small style="font-size: 15px;">Trang chủ</small></p></a>
                    <a href=""><p><small style="font-size: 15px;">Dự án</small></p></a>
                </li>

                <li class="header__nav__nav-list__nav-item link-footer margin_contact">
                    <a href=""><p><small style="font-size: 15px;">Source</small></p></a>
                    <a href=""><p><small style="font-size: 15px;">Liên hệ</small></p></a>
                </li>
            </ul>
        </div>
    </div>

    <hr>
    <div class="footer part_3">
        <div class="header__nav">
            <ul class="header__nav__nav-list">
                <li class="header__nav__nav-list__nav-item icon-footer margin_footer">Copyright CIT Team &copy 2023. All rights reserved.</li>
            </ul>
        </div>
    </div>
</footer>

<script> 
    let chooseVIHead = document.getElementsByClassName('vietnamese')[0];
    let chooseENHead = document.getElementsByClassName('english')[0];
    let chooseVIFoot = document.getElementsByClassName('vietnamese')[2];
    let chooseENFoot = document.getElementsByClassName('english')[2];
    let chooseVIBody = document.getElementsByClassName('vietnamese')[1];
    let chooseENBody = document.getElementsByClassName('english')[1];
    let currentLanguage = localStorage.getItem('language')
    
    window.onload = function () {
        if(!window.location.href.includes('?')) {
            localStorage.setItem('language', 'EN')
        }

        let currentLanguage = localStorage.getItem('language')
        if(currentLanguage == 'VI')
        {
            chooseVIHead.classList.remove('d-none')
            chooseENHead.classList.add('d-none')
            chooseVIFoot.classList.remove('d-none')
            chooseENFoot.classList.add('d-none')
            chooseVIBody.classList.remove('d-none')
            chooseENBody.classList.add('d-none')
        }

        if (currentLanguage == 'EN')
        {
            chooseENHead.classList.remove('d-none')
            chooseVIHead.classList.add('d-none')
            chooseENFoot.classList.remove('d-none')
            chooseVIFoot.classList.add('d-none')
            chooseENBody.classList.remove('d-none')
            chooseVIBody.classList.add('d-none')
        }
    }

    function clickLanguage () {
        if(currentLanguage == 'VI') {
            localStorage.setItem('language', 'EN')
        }

        if(currentLanguage == 'EN') {
            localStorage.setItem('language', 'VI')
        }
    }
</script>
</html>