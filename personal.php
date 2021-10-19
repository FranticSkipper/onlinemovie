<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Личный кабинет</title>
</head>
<body>
    <?php include('header.php')?>
    <main id="main">
        <section class="personal">
    <div class="personal__container container">
        <div class="personal__inner">
         <?php include('personal/user.php')?>
         <div class="personal__lists personal-lists">
                    <div class="personal-lists__title">Запланировано</div>
                    <div class="personal-lists__planned personal-planned">
                        <?php include("personal/planned.php")?>
                    </div>
                    <div class="personal-lists__title">Просмотрено</div>
                    <div class="personal-lists__viewed personal-viewed">
                        <?php include("personal/viewed.php")?>
                    </div>
                    <div class="personal-lists__title">Брошено</div>
                    <div class="personal-lists__thrown personal-thrown">
                        <?php include("personal/thrown.php")?>
                    </div>
                </div>
            </div>

    </div>
</section>
    </main>
    
    <script src="js/script.min.js"></script>
    
</body>
</html>