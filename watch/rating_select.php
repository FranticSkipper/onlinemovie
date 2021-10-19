<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";


    $film_id = $_GET['id'];
    $rating = $_POST['rate'];
    $user_id = $_COOKIE['user_id'];
    
    $connect = new mysqli($servername, $username, $password, $dbname); 
    
    $result = $connect->query("SELECT * FROM rating WHERE `user_id` = $user_id AND `film_id` = $film_id");
    $row = $result->fetch_assoc();
    if(count($row) > 0){
        $connect->query("UPDATE `rating` SET `rating` = $rating WHERE `film_id` = $film_id AND `user_id` = $user_id");
    }
    else{
        $connect->query("INSERT INTO `rating` (`user_id`, `film_id`, `rating`) VALUES ('$user_id', '$film_id', '$rating')");
    }
    
    header('location: /watch.php?id='.$film_id);
    $connect->close;
?>