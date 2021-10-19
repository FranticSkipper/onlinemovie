<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $film_id = $_GET['id'];
    $user_id = $_COOKIE['user_id'];
    $translate_to_rus = [
        'planned' => 'Посмотрю позже',
        'viewed' => 'Уже посмотрел',
        'thrown' => 'Забросил'
    ];
    
    $connect = new mysqli($servername, $username, $password, $dbname); 

    $result = $connect->query("SELECT * FROM `list_planned` WHERE `user_id` = '$user_id' AND `film_id` = '$film_id'");
    $row = $result->fetch_row();
    if($row){
        $list_name = 'planned';
    }
    if(!$row){
        $result = $connect->query("SELECT * FROM `list_thrown` WHERE `user_id` = '$user_id' AND `film_id` = '$film_id'");
        $row = $result->fetch_row();
        $list_name = 'thrown';
    }
    if(!$row){
        $result = $connect->query("SELECT * FROM `list_viewed` WHERE `user_id` = '$user_id' AND `film_id` = '$film_id'");
        $row = $result->fetch_row();
        $list_name = 'viewed';
    }
    if(!$row){
        echo '
        <div class="movie__add movie-add">
            <a href="watch/planned_add.php?id='.$film_id.'" class="movie-add__planned">Посмотрю позже</a>
            <a href="watch/viewed_add.php?id='.$film_id.'" class="movie-add__reviewed">Уже посмотрел</a>
            <a href="watch/thrown_add.php?id='.$film_id.'" class="movie-add__abandoned">Забросил</a>
        </div>
        ';
    }
    else{
        echo'
        <div class="movie-added">
            <div class="movie-added__text">Фильм добавлен в список "'.$translate_to_rus[$list_name].'"!</div>
            <a href="watch/list_delete.php?id='.$film_id.'&list='.$list_name.'" class="movie-added__del">Удалить</a>
            <a href="watch/list_change.php?id='.$film_id.'&current_list=list_'.$list_name.'&new_list=list_planned" class="movie-added__planned">Добавить в "Посмотрю позже"</a>
            <a href="watch/list_change.php?id='.$film_id.'&current_list=list_'.$list_name.'&new_list=list_viewed" class="movie-added__reviewed">Добавить в "Уже посмотрел"</a>
            <a href="watch/list_change.php?id='.$film_id.'&current_list=list_'.$list_name.'&new_list=list_thrown" class="movie-added__abandoned">Добавить в "Забросил"</a>
        </div>
        ';
    }

    $connect->close();
?>

