<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'onlinemovie';

    $film_id = $_GET['id'];
    $user_id = $_COOKIE['user_id'];

    $connect = new mysqli($servername, $username, $password, $dbname); 

    
    echo '
        <form action="watch/rating_select.php?id='.$film_id.'" method="post" class="movie__class movie-class">
            <div class="movie-class__text">Оцените фильм (0 - 5):</div>
                <label class="movie-class">
                1
                <input type="radio" name="rate" value="1" class="movie-class__input">
                </label>
                <label class="movie-class">
                2
                <input type="radio" name="rate" value="2" class="movie-class__input">
                </label>
                <label class="movie-class">
                3
                <input type="radio" name="rate" value="3" class="movie-class__input">
                </label>
                <label class="movie-class">
                4
                <input type="radio" name="rate" value="4" class="movie-class__input">
                </label>
                <label class="movie-class">
                5
                <input type="radio" name="rate" value="5" class="movie-class__input">
                </label>
            <button type="submit" class="movie-class__button button">Поставить</button>                   
        </form>
    ';
?>