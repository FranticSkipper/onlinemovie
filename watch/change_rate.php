<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $user_id = $_COOKIE['id'];
    $new_rating = $_POST['rating'];
    
    $connect = new mysqli($servername, $username, $password, $dbname); 

    $connect->query("UPDATE `rating` SET `rating` = '$new_rating' WHERE `user_id` = '$user_id' AND `film_id` = '$film_id'");
    
    $connect->close;
?>