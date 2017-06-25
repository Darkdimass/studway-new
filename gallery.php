<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 15.06.2017
 * Time: 0:03
 */

session_start();
require_once "function.php";
require_once "class.php";
$images = new gallery();
$count = $images->load_user_gallery($_GET['id']);
$img = $images->getImg();
$small_img = $images->getSmallImg();
$title = $images->getTitle();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Studway</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/photobox.css">
    <script src="/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src='js/jquery.photobox.js'></script>
    <script src="/js/ajax.js"></script>
</head>
<body id="top" class="login_page">

<nav id="nav" class="nav">
    <div class="positioner">
        <ul class="nav-menu-list">
            <li class="nav-menu-item"><a href="http://studway/profile.php?id=<?echo $_SESSION['id'];?>" class="nav-menu-link">Профиль</a></li>
            <li class="nav-menu-item"><a href="http://studway/news.php" class="nav-menu-link">Новости</a></li>
            <li class="nav-menu-item"><a href="#top" class="nav-menu-link">В начало страницы</a></li>
            <li class="nav-menu-item"><a href="#bottom" class="nav-menu-link">В конец страницы</a></li>
            <? if (isset($_SESSION['id'])){echo "<li class=\"nav-menu-item\"><a href=\"http://studway/redirect.php?action=log_out\" class=\"nav-menu-link\">log Out</a></li>";}?>
        </ul>
    </div>
</nav>


<section class="profile_logo"></section>

<section class="gallery">
    <div id='gallery'>

    <?

    for ($i = 0; $i < $count; $i++){
        echo "<a href=\"{$img[$i]}\">
        <img src=\"{$small_img[$i]}\"
             title=\"{$title[$i]}\">
    </a>";
    }
    echo "<div id=\"bottom\"></div>";
    ?>

<!--    <a href="img/03.png">-->
<!--        <img src="img/03s.png"-->
<!--             title="photo1 title">-->
<!--    </a>-->
<!--    <a href="img/slide-1.jpg">-->
<!--        <img src="img/slide-1s.jpg"-->
<!--             alt="photo2 title">-->
<!--    </a>-->

    </div>
    <script>
        // applying photobox on a `gallery` element which has lots of thumbnails links.
        // Passing options object as well:
        //-----------------------------------------------
        $('#gallery').photobox('a',{ time:0 });

        // using a callback and a fancier selector
        //----------------------------------------------
        $('#gallery').photobox('li > a.family',{ time:0 }, callback);
        function callback(){
            console.log('image has been loaded');
        }
    </script>
</section>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
    var navMenu = document.getElementById('nav');
    var navMenuOffset = navMenu.offsetTop;

    window.addEventListener('scroll', stickyMenu, false);
    window.addEventListener('touchmove', stickyMenu, false);


    function stickyMenu() {
        if (window.pageYOffset > navMenuOffset) {
            navMenu.classList.add('fixed-nav');
        } else {
            navMenu.classList.remove('fixed-nav');
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#nav").on("click","a", function (event) {
            //отменяем стандартную обработку нажатия по ссылке
//            event.preventDefault();
            //забираем идентификатор бока с атрибута href
            var id  = $(this).attr('href'),
                //узнаем высоту от начала страницы до блока на который ссылается якорь
                top = $(id).offset().top;
            //анимируем переход на расстояние - top за 1500 мс
            $('body,html').animate({scrollTop: top-$("#nav").height()}, 1500);
        });
    });
</script>
</body>
</html>
