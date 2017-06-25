<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 14.06.2017
 * Time: 19:34
 */

session_start();
require_once "function.php";
require_once "class.php";
$news = new news();
$news->load_all();

//if (!isset($_SESSION['user']))
//{header('Location: http://studway');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Studway</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/ajax.js"></script>
</head>
<body class="login_page">
<nav id="nav" class="nav">
    <div class="positioner">
        <ul class="nav-menu-list">
            <li class="nav-menu-item"><a href="http://studway/profile.php?id=<?echo $_SESSION['id'];?>" class="nav-menu-link">Профиль</a></li>
            <li class="nav-menu-item"><a href="#http://studway/galery.php" class="nav-menu-link">Фото</a></li>
            <li class="nav-menu-item"><a href="#http://studway/apps.php" class="nav-menu-link">Приложения</a></li>
            <li class="nav-menu-item"><a href="#top" class="nav-menu-link">В начало страницы</a></li>
            <li class="nav-menu-item"><a href="#bottom" class="nav-menu-link">В конец страницы</a></li>
        </ul>
    </div>
</nav>
<section id="top" class="main_logo"></section>
<section class="newsPage">
<?
for ($i = 0; $i < count($news->title); $i++){
    echo "<div class=\"news_wrapper\">
        <div class=\"user_info\">
            <div class=\"user_ico\" style=\"background-image: url('{$news->author_ico["$i"]}')\"></div>
            <div class=\"user_name\">{$news->author_name["$i"]} {$news->author_surname["$i"]}</div>
        </div>
        <div class=\"news_container\">
            <div class=\"news_title\">{$news->title["$i"]}</div>
            <div class=\"news_text\">{$news->text["$i"]}</div>
        </div>
    </div>
    <hr>";
}
echo "<div id=\"bottom\"></div>";
?>

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
            $('body,html').animate({scrollTop: top-$("#nav").height()}, 300);
        });
    });
</script>
<!--<script>-->
<!--    $.ajax({-->
<!--        url: "http://studway/ajax.php",-->
<!--        success: function(data){-->
<!--            alert( data );-->
<!--            data = $.parseJSON(data);-->
<!--            alert( data['key'] );-->
<!--        }-->
<!--    });-->
<!--</script>-->
</body>
