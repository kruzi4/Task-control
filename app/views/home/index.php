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
        <div class="sort">
          <h4>Сортировать по:</h4>
          <button class="btn"><a>Имени</a></button>
          <button class="btn"><a>Email</a></button>
          <button class="btn"><a>Статусу</a></button>
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
              <button class="btn" type="button" name="button">Задача выполнена</button>
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

        <!-- <div class="products">
            <?php for($i = 0; $i < count($data); $i++): ?>
            <div class="product">
                <div class="image">
                    <img src="/public/img/<?=$data[$i]['img']?>" alt="<?=$data[$i]['title']?>">
                </div>
                <h3><?=$data[$i]['title']?></h3>
                <p><?=$data[$i]['anons']?></p>
                <a href="/product/<?=$data[$i]['id']?>"><button class="btn">Детальнее</button></a>
            </div>
            <?php endfor; ?>
        </div> -->
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>
