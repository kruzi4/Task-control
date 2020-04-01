<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница интернет магазина">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Список задач</h1>
        <h4>Сортировать по:</h4>
        <div class="sort">
            <form action="/" method="post">
                <input type="hidden" name="sort_by_name" value="">
                <label for="sort_by_name"><button class="btn">Имени</button></label>
            </form>
            <form action="/" method="post">
                <input type="hidden" name="sort_by_email" value="">
                <label for="sort_by_email"><button class="btn">Email</button></label>
            </form>
            <form action="/" method="post">
                <input type="hidden" name="sort_by_status" value="">
                <label for="sort_by_status"><button class="btn">Статусу</button></label>
            </form>
        </div>

        <div class="tasks">
          <?php for($i = 0; $i < count($data['task']); $i++): ?>
            <div class="task">
              <h3>
                  <?=$data[task][$i]['title']?>
                  <?php if($data[task][$i]['status'] == 2): ?><img class="done" src="/public/img/done.svg" alt="Выполнено"><?endif;?>
              </h3>
              <div class="info">
                <span><?=$data[task][$i]['user_name']?></span><br>
                <span><?=$data[task][$i]['user_email']?></span>
              </div>
              <p><?=$data[task][$i]['text']?></p>
<!--              <button class="btn admin" type="button" name="button">Редактировать</button>-->
<!--              <button class="btn admin" type="button" name="button">Задача выполнена</button>-->
            </div>
          <?php endfor; ?>
        </div>

        <?php if ($data['pages'] > 1): ?>
        <div class="pages">
            <?php for($i = 1;$i <= $data['pages']; $i++): ?>
                <a href="/<?=$i?>"><?=$i?></a>
            <?php endfor; ?>
        </div>
        <?endif; ?>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>
