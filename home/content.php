<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'onlinemovie';

    $connect = new mysqli($servername, $username, $password, $dbname); 

    if($_GET['genre'] == ''){
        $result = $connect->query("SELECT * FROM `films`");
    }
    else{
        $genre_id = '('.implode(',',$_GET['genre']).')';
        $result_films_id = $connect->query("SELECT `film_id` FROM `films_genres` WHERE `genre_id` IN $genre_id");
        
        foreach($result_films_id as $value){
            $films_arr[] = $value['film_id'];
        }
        $films_str = '('.implode(',',$films_arr).')';

        $result = $connect->query("SELECT * FROM `films` WHERE `id` IN $films_str");
    }

    while($row = $result->fetch_assoc()){
        $data[] = array(
            'id' => $row["id"],
            'title' => $row["title"],
            'description' => $row["description"],
            'rating' => $row["rating"],
            'series' => $row["series"]
        );
    }

    foreach($data as $value){
        echo '
        <div data-content-id='.$value["id"].' class="films__column">
            <div class="films__item films-item">
                <div class="films-item__top">
                    <a href="watch.php?id='.$value['id'].'" class="films-item__img">
                        <img src="images/film-'.$value["id"].'.jpg" alt="Фильм" class="films-item__img"></picture>
                    </a>
                </div>
                <div class="films-item__footer">
                    <div class="films-item__name">'.$value["title"].'</div>
                </div>
            </div>
        </div>
        ';
     }

    $connect->close();
?>