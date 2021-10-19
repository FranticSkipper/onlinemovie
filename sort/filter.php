<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'onlinemovie';

    
    $connect = new mysqli($servername, $username, $password, $dbname); 

    $parametrs = $_POST['filter'];
    $parametrs_str = '(\''.implode('\',\'',$parametrs).'\')';
    $result = $connect->query("SELECT id FROM genres WHERE genre IN $parametrs_str");

    foreach($result as $value){
        $genre_arr[] = $value['id'];
    }
    $get = http_build_query(array('genre' => $genre_arr));
    
    header('Location: ../sort.php?'.$get);
    $connect->close();
?>
