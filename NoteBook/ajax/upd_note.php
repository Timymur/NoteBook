<?php
    $name = trim( filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
    $id = trim( filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS));
    $num = trim( filter_var($_POST['num'], FILTER_SANITIZE_SPECIAL_CHARS));
    $adres = trim( filter_var($_POST['adres'], FILTER_SANITIZE_SPECIAL_CHARS));
    $note = trim( filter_var($_POST['note'], FILTER_SANITIZE_SPECIAL_CHARS));
    $date = trim( filter_var($_POST['date'], FILTER_SANITIZE_SPECIAL_CHARS));
    $TOR = trim( filter_var($_POST['TOR'], FILTER_SANITIZE_SPECIAL_CHARS));


    $error = '';

    if(strlen($name) < 2)
        $error = 'Введите имя';
    else if(strlen($num) < 1)
        $error = 'Введите номер';
    else if(strlen($adres) < 1)
        $error = 'Введите адрес';
    else if(strlen($note) < 1)
        $error = 'Введите запись';
    else if(strlen($date) < 1)
        $error = 'Введите дату';
    else if(strlen($TOR) < 1)
        $error = 'Введите тип взаимоотношений';

    if ($error!=''){
       echo $error;
       exit();
    }

    $pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');


    $sql = "UPDATE users SET name = ? , num = ?, adres = ? WHERE users.id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$name, $num, $adres, $id]);


    $sql = "UPDATE notes SET note = ?, date = ? WHERE user_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([ $note, $date, $id ]);


    $sql = "UPDATE typeOfRelationShip SET TOR = ? WHERE id_user = ?";
    $query = $pdo->prepare($sql);
    $query->execute([ $TOR, $id ]);



    echo "Done";
