<?php
    $name = trim( filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($name) < 2)
        $error = 'Введите имя';

    if ($error!=''){
        echo $error;
        exit();
    }

    $pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');

    $sql = "SELECT * FROM users WHERE users.name = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$name]);

    $all = $query->fetch(PDO::FETCH_OBJ);

    echo $all->id;
