<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'onlinemovie';

    $user_id = $_COOKIE['user_id'];
    $film_id = $_GET['id'];

    $thrown_arr = [];
    $data = [];
    $connect = new mysqli($servername, $username, $password, $dbname); 

    if(!$user_id){
        $user_id = 0;
    }

    $user_check = $connect->query("SELECT `public_lists` FROM `users` WHERE `id` = '$current_user'");
    $row_check = $user_check->fetch_assoc();
    if($current_user == $user_id || $row_check['public_lists'] == 1){
        $films = $connect->query("SELECT `film_id` FROM `list_thrown` WHERE `user_id` = $user_id");
        if(count($films->fetch_assoc()) > 0){
            foreach($films as $value){
                array_push($thrown_arr, $value['film_id']);
            }
            $films_str = '('.implode(',',$thrown_arr).')';
            $result = $connect->query("SELECT id,title FROM `films` WHERE `id` IN $films_str");
            while($row = $result->fetch_assoc()){
                array_push($data, array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                ));
            };
            foreach($data as $value){
                echo '
                    <div class="personal-planned__column">
                        <div class="personal-planned__item">
                            <div class="personal-planned__top">
                                <a href="watch.php?id='.$value['id'].'">
                                    <div class="personal-planned__img">
                                        <img src="images/film-'.$value['id'].'.jpg" alt="#">
                                    </div>
                                </a>
                            </div>
                            <div class="personal-planned__title">'.$value['title'].'</div>
                        </div>
                    </div>
                ';
            }
        }
        else{
            echo 'Список пуст!';
        }
    }
    else{
        echo 'Просмотр ограничен!';
    }
    $connect->close();
?>