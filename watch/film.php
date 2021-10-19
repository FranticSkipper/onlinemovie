<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $film_id = $_GET["id"];
   
    $result_rating = $connect->query("SELECT rating FROM rating WHERE film_id = $film_id");
    $row_rating = $result_rating->fetch_assoc();
    if(count($row_rating) > 0){
        foreach($result_rating as $value){
            $total += $value['rating'];
            $count++;
        }
        $current_rating = round($total/$count);
    }
    else{
        $current_rating = 'Нет рейтинга!';
    }
    $result = $connect->query("SELECT * FROM films WHERE id = $film_id");

    $row = mysqli_fetch_array($result);
    $data = array(
        'id' => $row["id"],
        'title' => $row["title"],
        'description' => $row["description"],
        'rating' => $row["rating"],
        'series' => $row["series"]
    );

    
    if(!$current_rating){
        $current_rating = 'Нет оценок';
    }

    echo '
        <div class="movie__row">
            <div class="movie__image">
                <img src="images/film-'.$data['id'].'.jpg" alt="#">
            </div>
            <div class="movie__content">
                <div class="movie__title">'.$data['title'].'</div>
                <div class="movie__description">'.$data['description'].'</div>
                <div class="movie__rating">Рейтинг: <span>'.$current_rating.'</span></div>

            </div>
        </div>
    ';
    $connect->close();
?>