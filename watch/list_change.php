<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $film_id = $_GET['id'];
    $user_id = $_COOKIE['user_id'];
    $currentList = $_GET['current_list'];
    $new_list = $_GET['new_list'];

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $connect->query("DELETE FROM `$currentList` WHERE `user_id` = '$user_id' AND `film_id` = '$film_id'");
    $connect->query("INSERT INTO `$new_list` (`user_id`, `film_id`) VALUES ('$user_id', '$film_id')");
    $connect->close();

    header('location: /watch.php?id='.$film_id.'')
?>