<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $film_id = $_GET['id'];
    $list_name=$_GET['list'];
    $user_id = $_COOKIE['user_id'];

    $connect = new mysqli($servername, $username, $password, $dbname); 

    if($list_name == 'planned'){
        $connect->query("DELETE FROM `list_planned` WHERE `film_id` = '$film_id' AND `user_id` = '$user_id'");
    }
    else if($list_name == 'thrown'){
        $connect->query("DELETE FROM `list_thrown` WHERE `film_id` = '$film_id' AND `user_id` = '$user_id'");
    }
    else if($list_name == 'viewed'){
        $connect->query("DELETE FROM `list_viewed` WHERE `film_id` = '$film_id' AND `user_id` = '$user_id'");
    }

    header('location: /watch.php?id='.$film_id.'');
    
    $connect->close;
?>
