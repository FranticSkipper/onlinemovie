<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";
    
    $film_id = $_GET['id'];
    $user_id = $_COOKIE['user_id'];
    
    $connect = new mysqli($servername, $username, $password, $dbname); 

    $connect->query("INSERT INTO `list_thrown` (`user_id`, `film_id`) VALUES ('$user_id', '$film_id')");

    $connect->close();
    header('location: /watch.php?id='.$film_id.'')
?>