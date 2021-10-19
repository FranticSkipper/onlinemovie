<header class='header' id="header">
        <div class="header__container container">
            <div class="header__inner">
                <div class="header__logo">
                    <a href="/" class="header__logo-name">Online Movie</a>
                </div>
                    <?php if($_COOKIE['username'] != ''):?>
                    <div class="header__profile">
                        <a href="personal.php?id=<?=$_COOKIE['user_id']?>" class="header__profile-username"><?=$_COOKIE['username']?></a>
                        <a href="header/exit.php" class="header__profile-exit">Выйти</a>
                    </div>
                    <?php else: ?>
                    <div class="header__action">
                        <div class="header__tabs">
                            <div class="header__tabs-button">
                                <button class="button button-tab" data-tab='header-registration'>Регистрация</button>
                            </div>
                            <div class="header__tabs-button">
                                <button class="button button-tab" data-tab='header-login'>Авторизация</button>
                            </div>
                        </div>
                        <div class="header__forms">
                            <form action="header/auth.php" method="post" class="header__login header-login tab-content">
                                <label class="header-login__label">
                                    <div class="header-login__label-text">Имя</div>
                                    <input type="text" id="loginName" name='name' class="header-login__label-input">
                                </label>
                                <label class="header-login__label">
                                    <div class="header-login__label-text">Пароль</div>
                                    <input type="password" id="loginPassword" name='password' class="header-login__label-input">
                                </label>
                                <button class="header-login__button button" type="submit">Отправить</button>
                            </form>
                            <form action="header/check.php" method="post" class="header__registration header-registration tab-content">
                                <label class="header-registration__label">
                                    <div class="header-registration__label-text">Имя</div>
                                    <input type="text" id="registrationName" name='name' class="header-registration__label-input">
                                </label>
                                <label class="header-registration__label">
                                    <div class="header-registration__label-text">Пароль</div>
                                    <input type="password" id="registrationPassword" name='password' class="header-registration__label-input">
                                </label>
                                <button class="header-registration__button button" type="submit">Отправить</button>
                            </form>
                        </div>
                    </div>
                    <?php endif?>
            </div>
        </div>
    </header>