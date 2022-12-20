<?php
      $pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');

      $id = trim( filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS));

      $sql = 'DELETE FROM users WHERE `users`.`id` = ?';
      $query = $pdo->prepare($sql);
      $query->execute([$id]);

      echo "Done";
