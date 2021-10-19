<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $connect = new mysqli($servername, $username, $password, $dbname); 
    
    $comment = $_POST['comment'];
    $user_id = $_COOKIE['user_id'];
    $film_id = $_POST['id'];
 
    $connect -> query("INSERT INTO `comments` (`user_id`, `comment`, `film_id`) VALUES ('$user_id','$comment', '$film_id')");

    header('location: /watch.php?id='.$film_id);
    $connect->close;
?>