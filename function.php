<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 20.02.2017
 * Time: 2:28
 */
require_once "class.php";

session_start();


function connect()
{
    $mysqli = new mysqli('localhost', 'root', '', 'studway');


    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }
    return $mysqli;
};
