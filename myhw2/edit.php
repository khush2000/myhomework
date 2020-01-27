<?php
$login=$_POST['login'];
$old_pwd=$_POST['old_password'];
$new_pwd=$_POST['new_password'];
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

if($login!=null && $old_pwd!=null && $new_pwd!=null)
{
    if($row[1]==$login && $row[2]==$old_pwd)
    {             
        if($check==$new_pwd)
        {
            $sql = "UPDATE users SET pwd='$new_pwd' WHERE username='$login'";
            if (mysqli_query($link, $sql)) 
            {
                alert("Пароль успешно изменён!");
                require('index.html');
            }
            else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }
        else
        {
            alert("Пароль не подтвержден!");
            require('edit.html');  
        }          
    }
    else
    {          
        require('edit.html');
        alert("Неправильный логин или пароль");             
    }
}
else{
    require('edit.html');
    alert("Форма не заполнена полностью!");
}

mysqli_close($link);
?>