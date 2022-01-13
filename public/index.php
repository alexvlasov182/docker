<?php
  $db = new PDO("mysql:host=mysql;dbname=forge", "root", "123456");
  echo  "<pre>";
    foreach ($db->query('SELECT * FROM forge.articles;') as $row) {
      print_r($row);
    }
  echo "</pre>";