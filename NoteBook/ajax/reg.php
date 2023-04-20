<?php
$username = trim( filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim( filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim( filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$pass = trim( filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';


if(strlen($username) < 2)
    $error = 'Введите имя';
else if(strlen($email) < 7)
    $error = 'Введите email';
else if(strlen($login) < 3)
    $error = 'Введите login';
else if(strlen($pass) < 5)
    $error = 'Введите пароль';
if ($error!=''){
   echo $error;
   exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');


$salt = ";&*$^$*@#";
$pass = md5($salt . $pass);

$sql = "INSERT INTO admins(name, email, login, password) VALUES(?, ?, ?, ?)";
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo "Done";



 ?>
