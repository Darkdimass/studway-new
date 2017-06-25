<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 14.06.2017
 * Time: 17:15
 */
session_start();
require_once "function.php";
require_once "class.php";
if (isset($_SESSION['id']))
{header("Location: http://studway/profile.php?id={$_SESSION['id']}");}
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
</head>
<body class="login_page">
    <nav id="nav" class="nav">
        <div class="positioner">
            <ul class="nav-menu-list">
                <li class="nav-menu-item"><a href="http://studway/profile.php" class="nav-menu-link">Профиль</a></li>
                <li class="nav-menu-item"><a href="http://studway/galery.php" class="nav-menu-link">Фото</a></li>
                <li class="nav-menu-item"><a href="http://studway/apps.php" class="nav-menu-link">Приложения</a></li>
                <li class="nav-menu-item"><a href="http://studway/news.php" class="nav-menu-link">Новости</a></li>
            </ul>
        </div>
    </nav>
    <section class="main_logo" style="margin: 15px auto"></section>
    <section class="greeting">
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore eum impedit labore modi quisquam similique ullam vitae voluptas. Commodi cumque minima modi nisi, officia quidem ratione reiciendis reprehenderit. Eius.
        </div>
    </section>
    <section class="log_form">
        <form action="/redirect.php" method="post" enctype="multipart/form-data">
            <div id="res"></div>
            <input type="text" class="form_element" name="login"  placeholder="Login">
            <input id="pswd1" type="password" class="form_element" name="pswd1" placeholder="Password">
            <input id="pswd2" type="password" class="form_element" name="pswd" placeholder="RE-Password">
            <input type="text" class="form_element" name="name"  placeholder="Name">
            <input type="text" class="form_element" name="surname"  placeholder="Surname">
            <input type="text" class="form_element" name="city"  placeholder="City">
            <input type="text" class="form_element" name="country"  placeholder="Country">
            <textarea class="form_element area" placeholder="Interests" name="interests"></textarea>
            <textarea class="form_element area" placeholder="About" name="about"></textarea>
            <input type="text" class="form_element" placeholder="Else" name="else">
            <div class="file_div"><input type="file" class="file" name="file"></div>
            <input type="submit" class=" btn btn-primary form_element log_btn" name="reg_submit" value="LogIn">
            <div id="res"></div>
        </form>
    </section>
    <script>
        window.addEventListener("load",function(){
            document.getElementById("pswd2").addEventListener("blur",function(){
                var pswd1 = document.getElementById("pswd1"), pswd2 = document.getElementById("pswd2");
                if(pswd1.value!=pswd2.value){
                    pswd1.value = "";
                    pswd2.value = "";
                    document.getElementById("res").innerHTML = "Пароли не совпадают!";
                }
                else document.getElementById("res").innerHTML = "Пароли совпадают!";
            });
        })
    </script>

    
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</body>