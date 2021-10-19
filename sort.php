<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Фильтр</title>
</head>
<body>
    <?php include('header.php')?>
    <main id="main">
    <section class="filter">
        <div class="filter__container container">
            <div class="filter__inner">
                <form action="sort/filter.php" method="post" class="filter__form filter-form">
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='mystical' class="filter-form__input">
                        <div class="filter-form__text">Мистические</div>
                    </label>
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='musical' class="filter-form__input">
                        <div class="filter-form__text">Музыкальные</div>
                    </label>
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='adventures' class="filter-form__input">
                        <div class="filter-form__text">Приключения</div>
                    </label>
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='comix' class="filter-form__input">
                        <div class="filter-form__text">По комиксам</div>
                    </label>
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='russians' class="filter-form__input">
                        <div class="filter-form__text">Русские</div>
                    </label>
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='fantastic' class="filter-form__input">
                        <div class="filter-form__text">Фантастика</div>
                    </label>
                    <label class="filter-form__label">
                        <input type="checkbox" name="filter[]" value='militants' class="filter-form__input">
                        <div class="filter-form__text">Военные</div>
                    </label>
                    <button class="filter-form__button button">Найти</button>
                </form>

            </div>
        </div>
    </section>
    <section class="films">
        <div class="films__container container">
            <div class="films__inner">
                <?php include('home/content.php'); ?>
            </div>
        </div>
    </section>
    </main>
    <footer id="footer">
    
</footer>
    
    <script src="js/script.min.js"></script>
    
</body>
</html>