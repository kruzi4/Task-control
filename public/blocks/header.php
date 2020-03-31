<header>
    <div class="container top-menu">
        <div class="nav">
            <a href="/">Главная</a>
        </div>
        <div class="nav">
            <a href="/task/create">Создать задачу</a>
          <?php if($_COOKIE['login'] == ''): ?>
            <a href="/user/auth">Войти</a>
            <a href="/user/reg">Зарегистрироваться</a>
          <?php else: ?>
            <a href="/user/dashboard">Личный кабинет</a>
          <?php endif; ?>
        </div>
    </div>
    <div class="container middle">

    </div>
</header>
