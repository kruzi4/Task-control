<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать задачу</title>
    <meta name="description" content="Создать задачу">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Создать задачу</h1>
        <form action="/" method="post" class="form-control">
            <input type="text" name="title" placeholder="Введите заглавие задачи" value=""><br>
            <textarea name="text" placeholder="Введите текст задачи" value=""></textarea><br>
            <input type="text" name="user_name" placeholder="Введите имя" value=""><br>
            <input type="text" name="user_email" placeholder="Введите email" value="">
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Создать</button>
        </form>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>