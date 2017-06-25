<?php

/**
 * Created by PhpStorm.
 * User: mater
 * Date: 20.02.2017
 * Time: 2:37
 */
require_once "function.php";
session_start();

class user
{
    private $name, $surname, $id, $ico;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIco()
    {
        return $this->ico;
    }

    public function setIco($ico)
    {
        $this->ico = $ico;
    }

    function load_user($login, $pswd)
    {
        $mysqli = connect();
        $sql = "SELECT * FROM users WHERE log = '$login' AND pass = '$pswd'";
        $result = mysqli_query($mysqli, $sql);
        $db = $result->fetch_array();
        if (isset($db)) {
            $this->name = $db['name'];
            $this->surname = $db['surname'];
            $this->id = $db['id'];
            $this->ico = $db['ico'];
            $mysqli->close();
        } else return null;
    }

    static function store_user($login, $pswd, $name, $surname, $ico)
    {
        $mysqli = connect();
        $sql = "SELECT log FROM users WHERE log = '$login'";
        $result = mysqli_query($mysqli, $sql);
        $result = $result->fetch_array();
        if (!isset($result)){
        $sql = "INSERT INTO users (log,pass,name,surname,ico) VALUES ('$login','$pswd','$name','$surname','$ico')";
        mysqli_query($mysqli, $sql);
            $sql = "SELECT id FROM users WHERE log = '$login'";
            $result = mysqli_query($mysqli, $sql);
            $result = $result->fetch_array();
        }
        $mysqli->close();
        return $result['id'];
    }

    function load_profile($id)
    {
        $mysqli = connect();
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($mysqli, $sql);
        $db = $result->fetch_array();
        $this->name = $db['name'];
        $this->surname = $db['surname'];
        $this->id = $db['id'];
        $this->ico = $db['ico'];
    }

    function access_granted(){
        $_SESSION['name'] = $this->name;
        $_SESSION['surname'] = $this->surname;
        $_SESSION['id'] = $this->id;
        $_SESSION['ico'] = $this->ico;
    }
}

class u_info extends user
{

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getInterests()
    {
        return $this->interests;
    }

    public function setInterests($interests)
    {
        $this->interests = $interests;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function setAbout($about)
    {
        $this->about = $about;
    }

    public function getElse()
    {
        return $this->else;
    }

    public function setElse($else)
    {
        $this->else = $else;
    }
    private $city, $country, $interests, $about, $else;

    function load_user_info($id)
    {
        $mysqli = connect();
        $sql = "SELECT * FROM additional_data WHERE user_id = '$id'";
        $result = mysqli_query($mysqli, $sql);
        $db = $result->fetch_array();
        if (isset($db)) {
            $this->city = $db['city'];
            $this->country = $db['country'];
            $this->interests = $db['interests'];
            $this->about = $db['about'];
            $this->else = $db['else'];
            $mysqli->close();
        } else return null;
    }



    static function store_user_info($city, $country, $interests, $about, $else, $id)
    {
        $mysqli = connect();
        $sql = "INSERT INTO additional_data (`city`,`country`,`interests`,`about`,`else`,`user_id`) VALUES ('$city','$country','$interests','$about','$else','$id')";
        mysqli_query($mysqli, $sql);
        $mysqli->close();
    }
}

class news
{
    public $title, $text, $author_name, $author_surname, $author_ico, $author_id;
    function load_all(){
        $mysqli = connect();
        $sql = "SELECT * FROM news";
        $result = mysqli_query($mysqli, $sql);
        while($db = $result->fetch_array()){
            $this->author_id = $db['author_id'];
            $sql1 = "SELECT * FROM users WHERE id = '$this->author_id'";
            $result1 = mysqli_query($mysqli, $sql1);
            $src = $result1->fetch_array();
            $this->title[]=$db['title'];
            $this->text[]=$db['text'];
            $this->author_name[]=$src['name'];
            $this->author_surname[]=$src['surname'];
            $this->author_ico[]=$src['ico'];
        }
        $mysqli->close();
    }

    function load_user_news($id){
        $mysqli = connect();
        $sql = "SELECT * FROM news WHERE author_id = '$id'";
        $result = mysqli_query($mysqli, $sql);
        while($db = $result->fetch_array()){
            $this->author_id = $db['author_id'];
            $sql1 = "SELECT * FROM users WHERE id = '$this->author_id'";
            $result1 = mysqli_query($mysqli, $sql1);
            $src = $result1->fetch_array();
            $this->title[]=$db['title'];
            $this->text[]=$db['text'];
            $this->author_name[]=$src['name'];
            $this->author_surname[]=$src['surname'];
            $this->author_ico[]=$src['ico'];
        }
        $mysqli->close();
    }
}

class gallery{
    private $id, $author, $img, $title, $small_img, $author_info;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSmallImg()
    {
        return $this->small_img;
    }

    public function setSmallImg($small_img)
    {
        $this->small_img = $small_img;
    }

    public function getAuthorInfo()
    {
        return $this->author_info;
    }

    public function setAuthorInfo($author_info)
    {
        $this->author_info = $author_info;
    }

    function load_user_gallery($user_id){
        $this->author = $user_id;
        $mysqli = connect();
        $sql = "SELECT * FROM gallery WHERE author_id = '$user_id'";
        if (!isset($user_id) and $_SESSION['id'] == 1){
            $sql = "SELECT * FROM gallery";
        }
        $result = mysqli_query($mysqli, $sql);
        while($db = $result->fetch_array()){
            $sql1 = "SELECT * FROM users WHERE id = '$this->author'";
            $result1 = mysqli_query($mysqli, $sql1);
            $src = $result1->fetch_array();
            $this->title[]=$db['title'];
            $this->img[]=$db['img'];
            $this->id[]=$db['id'];
            $this->small_img[]=$db['img_s'];
            $this->author_info=array(
                "name"=>"{$src['name']}",
                "surname"=>"{$src['surname']}",
                "ico"=>"{$src['ico']}"
            );
        }
        $mysqli->close();
        return count($this->id);
    }
}