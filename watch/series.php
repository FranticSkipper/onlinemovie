<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $film_id = $_GET["id"];

    $result_series = $connect->query("SELECT series FROM films WHERE id = $film_id");
    
    $row_series = $result_series->fetch_assoc();
    $series = $row_series['series'];    

    $result = $connect->query("SELECT id,title FROM films WHERE series = '$series'");

    foreach($result as $value){
        echo '
            <div class="movie-another__column">
                <div class="movie-another__item">
                    <div class="movie-another__top">
                        <a href="watch.php?id='.$value['id'].'" class="movie-another__img">
                            <img src="images/film-'.$value['id'].'.jpg" alt="#">
                        </a>
                    </div>
                    <div class="movie-another__title">'.$value['title'].'</div>
                </div>
            </div>
        ';
     }
    $connect->close();
?>
