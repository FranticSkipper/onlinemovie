<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemovie";

    $status = $_POST["status"];
    $current_user = $_GET['id'];
    $user_id = $_COOKIE["user_id"];

    $connect = new mysqli($servername, $username, $password, $dbname); 

    $result = $connect->query("SELECT `username` FROM `users` WHERE `id` = '$current_user'");
    $row = $result->fetch_assoc();
    echo '
        <div class="personal-user__name">'.$row['username'].'</div>'
    ;
    if($current_user == $user_id){
        echo '
        <form action="personal/user_public.php" method="post" class="personal__public personal-public">
            <label class="personal-public__label">
                Сделать списки приватными
                <input type="radio" name="status" value="0" class="personal-public__input">
            </label>
            <label class="personal-public__label">
                Сделать списки публичными
                <input type="radio" name="status" value="1" class="personal-public__input">
            </label>
            <button class="personal-public__button button">Применить</button>
        </form>
    ';
    }
    
    
    $connect->close;
?>
