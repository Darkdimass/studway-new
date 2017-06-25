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
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body class="login_page">
    <nav id="nav" class="nav">
        <div class="positioner">
            <ul class="nav-menu-list">
                <li class="nav-menu-item"><a href="http://studway/profile.php" class="nav-menu-link">Профиль</a></li>
                <li class="nav-menu-item"><a href="http://studway/news.php" class="nav-menu-link">Новости</a></li>
                <li class="nav-menu-item"><a href="http://studway/galery.php" class="nav-menu-link">Фото</a></li>
                <li class="nav-menu-item"><a href="http://studway/registration.php" class="nav-menu-link">Регистрация</a></li>
            </ul>
        </div>
    </nav>
    <section class="main_logo"></section>
    <section class="greeting">
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore eum impedit labore modi quisquam similique ullam vitae voluptas. Commodi cumque minima modi nisi, officia quidem ratione reiciendis reprehenderit. Eius.
        </div>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore eum impedit labore modi quisquam similique ullam vitae voluptas. Commodi cumque minima modi nisi, officia quidem ratione reiciendis reprehenderit. Eius.
        </div>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore eum impedit labore modi quisquam similique ullam vitae voluptas. Commodi cumque minima modi nisi, officia quidem ratione reiciendis reprehenderit. Eius.
        </div>
    </section>
    <section class="log_form">
        <form action="/redirect.php" method="post">
            <input type="text" class="form_element" name="login"  placeholder="Login">
            <input type="password" class="form_element" name="pswd" placeholder="Password">
            <input type="submit" class=" btn btn-primary form_element log_btn" name="log_submit" value="LogIn">
        </form>
    </section>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</body>