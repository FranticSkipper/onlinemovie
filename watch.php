<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Фильм</title>
</head>
<body>
    <?php include('header.php')?>
    <main id="main">
        <section class="movie">
            <div class="movie__container container">
                <div class="movie__inner">
                    <?php include('watch/film.php')?>
                    <?php if($_COOKIE['username'] != ''):?>
                        <div class="movie__actions">
                            <?php include('watch/list_check.php')?>
                            <?php include('watch/rating_set.php')?>
                            <?php include('watch/rating.php')?>
                        </div>
                    <?php endif?>
                    <div class="movie__another movie-another">
                        <div class="movie-another__text">Другие фильмы этой серии</div>
                        <div class="movie-another__row">
                        <?php include('watch/series.php')?>   
                        </div>
                                
                    </div>
                    <?php if($_COOKIE['username'] == ''):?>
                        <div class="movie-class__text">Вы не авторизированы!</div>
                    <?php else:?>
                        <form action="watch/comment_add.php" method="post" class="movie__form form-movie">
                            <div class="movie-class__write">
                                <label class="form-movie__label">
                                    <div class="form-movie__text">Сообщение</div>
                                    <input type="hidden" name='id' value=<?=$_GET['id']?>>
                                    <textarea name="comment" cols="30" rows="5" class="form-movie__textarea"></textarea>
                                </label>
                                <button class="form-movie__button button">Отправить</button>
                            </div>
                        </form>
                    <?php endif?>  
                    <div class="movie__comments">
                        <div class="movie__comment movie-comment">
                            <div class="movie-comment__inner">
                                <?php include('watch/comments_show.php')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/script.min.js"></script>
    
</body>
</html>