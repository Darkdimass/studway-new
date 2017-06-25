<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 20.06.2017
 * Time: 16:20
 */
session_start();
require_once "function.php";
require_once "class.php";
if (isset($_POST['log_submit'])){
    $user = new user();
    $user->load_user($_POST['login'],$_POST['pswd']);
    $uid = $user->getId();
    if (isset($uid)){
        $user->access_granted();
        header("Location: http://studway/profile.php?id={$user->getId()}");
    }else{
        header("Location: http://studway/index.php?alert=access_denied");
    }

}
if (isset($_POST['reg_submit'])){
    $uploaddir = 'D:\Liquid\OpenServer\domains\studway\img\\';
    $uploadfile = $uploaddir.basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
    {
        $a = user::store_user($_POST['login'],$_POST['pswd'],$_POST['name'],$_POST['surname'],"../img/".$_FILES['file']['name']);
        u_info::store_user_info($_POST['city'],$_POST['country'],$_POST['interests'],$_POST['about'],$_POST['else'],$a);
        header("Location: http://studway/profile.php?id=$a");
    }
    else { header("Location: http://studway/registration.php"); }

}

if (isset($_GET['action'])){
   switch ($_GET['action']){
       case "log_out":
           unset($user);
           session_destroy();
           header("Location: http://studway/index.php");
           break;

   }
}