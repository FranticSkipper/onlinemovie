<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $login = $_POST['name'];
    $password = $_POST['password'];

    $result = $connect->query("SELECT * FROM `users` WHERE `username`='$login' AND `password`='$password'");
    $user = $result->fetch_assoc();
    
    if($user == 0){
        $connect->query("INSERT INTO `users` (`username`, `password`) VALUES ('$login', '$password')");
    }

    $connect->close;

    header('location: /');
?>