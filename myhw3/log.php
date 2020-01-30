<?php
$login=$_POST['login'];
$pwd=$_POST['password'];
error_reporting(0); 
//подключение к базе
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 

$query ="SELECT * FROM users WHERE username = '$login'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$row = mysqli_fetch_row($result);


function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if($login!=null)
{
    if($row[1]==$login && $row[2]==$pwd)
    {   
        session_start();
        $_SESSION['user'] = $login;                                         
        require('good.php');           
    }
    else
    {          
        require('log.html');
        alert("Неправильный логин или пароль");             
    }
}
else{
    require('log.html');
    alert("Введите логин и пароль!");
}
mysqli_close($link);
?>