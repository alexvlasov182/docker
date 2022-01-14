<?php
  $db = new PDO("mysql:host=mysql;dbname=forge", "root", "123456");

  if(isset($_POST['article_name']) && isset($_POST['article_description'])) {
    $query = $db->prepare("INSERT INTO `forge`.`articles` (`title`, `description`) VALUES (:title, :description)");
    $query->execute([
      'title' => $_POST['article_name'],
      'description' => $_POST['article_description'],
    ]);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
  }

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h1>Articles</h1>
    </div>
    <hr>
    <div class="row">
      <?php

      $html = '';

      foreach ($db->query('SELECT * FROM forge.articles;') as $row) {
        $html .=   " <div class='col-12'>";
        $html .=   "  <h2>";
        $html .=         $row['title'];
        $html .=  "    </h2>";
        $html .=   "    <p>";
        $html .=         $row['description'];
        $html .=  "    </p>";
        $html .=  "  </div>";
      }

      echo $html;

      ?>
    </div>
    <div class="row">
      <div class="col-12">
        <h2>New Article</h2>
      </div>
      <form class="col-12" action="index.php" method="post">
        <div class="form-group mb-2">
          <label for="exampleFormControlInput1">Article name</label>
          <input type="text" name="article_name" class="form-control" id="exampleFormControlInput1" placeholder="enter article's name">
        </div>


        <div class="form-group mb-2">
          <label for="exampleFormControlTextarea1">Desription</label>
          <textarea class="form-control" name="article_description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-20">Create article</button>
      </form>
    </div>
  </div>


</body>
</html>
