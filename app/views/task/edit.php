<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать задачу</title>
    <meta name="description" content="Редактировать задачу">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
</head>
<body>
<?php require 'public/blocks/header.php' ?>

<div class="container main">
    <h1>Редактировать задачу</h1>
    <form action="/task/edit/<?=$data['id']?>" method="post" class="form-control">
        <input type="text" name="edit_title" placeholder="Введите заглавие задачи" value="<?=$data['title']?>"><br>
        <textarea name="edit_text" placeholder="Введите текст задачи"><?=$data['text']?></textarea><br>
        <input type="edit_text" name="edit_user_name" placeholder="Введите имя" value="<?=$data['user_name']?>"><br>
        <input type="edit_email" name="edit_user_email" placeholder="Введите email" value="<?=$data['user_email']?>">
        <button class="btn" id="send">Редактировать</button>
    </form>
</div>

<?php require 'public/blocks/footer.php' ?>
</body>
</html>