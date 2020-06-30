<!DOCTYPE html>
<html>
  <head>
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <textarea class="field" name="task_text" id ="task_text" placeholder="Введите текст задачи..."></textarea>
      <button class="btn" type="button">Добавить</button>
      <?php
        $db = 'mysql:host=fdb22.awardspace.net;dbname=3493522_lobanovvs';
        $pdo = new PDO($db,'3493522_lobanovvs','test123!');
        echo '<ul class="list">';
        $query = $pdo->query('SELECT * FROM tasks order by id desc');
        while($tmp = $query->fetch(PDO::FETCH_OBJ)) {
          echo '<li><p>'.$tmp->task.'</p><button type="button" class="del_btn" data="'.$tmp->id.'">Удалить</button></li>';
        }
        echo '</ul>';
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>