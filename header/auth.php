<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $login = $_POST['name'];
    $password = $_POST['password'];

    $result = $connect->query("SELECT id,username FROM `users` WHERE `username` = '$login' AND `password` = '$password'");

    $user = $result->fetch_assoc();
    if($user == 0){
        header('Location: /');
        exit();
    }
    setcookie('user_id', $user['id'], time() + 3600, '/');
    setcookie('username', $user['username'], time() + 3600, '/');
    header('Location: /');

    $connect->close;
?>
