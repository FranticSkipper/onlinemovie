<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'onlinemovie';

    $user_id = $_COOKIE['user_id'];
    $status = $_POST['status'];

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $connect->query("UPDATE `users` SET `public_lists` = '$status' WHERE `id` = '$user_id'");
    
    $connect->close();
    header('location: /personal.php?id='.$user_id)
?>