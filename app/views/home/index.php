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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Список задач</h1>
        <div class="sort">
          <h4>Сортировать по:</h4>
          <a>Имени</a>
          <a>Email</a>
          <a>Статусу</a>
        </div>
        <div class="tasks">
          <?php for ($i=0; $i < 3; $i++): ?>
            <div class="task">
              <h3>Заглавие задачи <img class="done" src="/public/img/done.svg" alt="Выполнено"></h3>
              <div class="info">
                <span>Константин</span><br>
                <span>kostyabest@ukr.net</span>
              </div>
              <p>LoremLorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo itaque quisquam delectus voluptatum, in quaerat architecto nam libero assumenda quo, repellendus quasi veritatis impedit earum excepturi velit consequatur cumque ad. Lorem20</p>
              <button class="btn" type="button" name="button">Задача выполнена</button>
            </div>
          <?php endfor; ?>
        </div>
        <div class="pages">
          <a>1</a>
          <a>2</a>
          <a>3</a>
          <a>4</a>
        </div>

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
