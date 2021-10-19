<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'onlinemovie';

    $film_id = $_GET['id'];
    $user_id = $_COOKIE['user_id'];
    $connect = new mysqli($servername, $username, $password, $dbname); 

    $result = $connect->query("SELECT * FROM `rating` WHERE `film_id` = $film_id AND `user_id` = $user_id");
    $row = $result->fetch_assoc();
    if(count($row)){
        echo '
            <div class="movie-class__text">Вы оценили фильм на '.$row['rating'].'</div>
        ';
    }
    else{
        echo '
            <div class="movie-class__text">Вы еще не оценили фильм.</div>
        ';
    }
    
?>