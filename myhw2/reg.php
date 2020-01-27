<?php
$login=$_POST['login'];
$pwd=$_POST['password'];
$check=$_POST['password_check'];
error_reporting(0);
//подключение к базе
require_once 'connection.php';

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 

$query ="SELECT * FROM users WHERE username = '$login'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$row = mysqli_fetch_row($result);

if($login!=null && $pwd!=null)
{
if($check==$pwd)
{
    if($row[1]==$login)
    {
        alert("Ползователь с таким логинам уже зарегистрирован!"); 
        require('index.html'); 
    }
    else{
    $sql = "INSERT INTO users (username, pwd) VALUES ('$login', '$pwd')";
    if (mysqli_query($link, $sql)) 
    {
        alert("Вы успешно зарегистрировались!"); 
        require('index.html'); 
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}
}
else
{
    alert("Пароль не подтвержден!");
    require('index.html');  
}
}
else
{
    alert("Форма регистрации не заполнена полностью!");
    require('index.html');
}
mysqli_close($link);
?>