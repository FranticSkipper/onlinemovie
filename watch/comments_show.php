<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";
    $film_id = $_GET["id"];
    $data = [];
    $connect = new mysqli($servername, $username, $password, $dbname); 

    $result = $connect->query("SELECT `user_id`,`comment` FROM `comments` WHERE `film_id` = '$film_id'");
    while($row = $result->fetch_assoc()){
        $user_search = $row['user_id'];
        $user_name = $connect->query("SELECT `username` FROM `users` WHERE `id` = '$user_search'");
        $user_row = $user_name->fetch_assoc();

        array_push($data, array(
            'user_id' => $row['user_id'],
            'username' => $user_row['username'],
            'comment' => $row['comment']
            )
        );
    }

    foreach($data as $value){
        echo '
            <div class="movie-comment__item">
                <a href="personal.php?id='.$value['user_id'].'" class="movie-comment__username">'.$value['username'].'</a>
                <div class="movie-comment__usertext">'.$value['comment'].'</div>
            </div>
        ';
     }
    
?>




