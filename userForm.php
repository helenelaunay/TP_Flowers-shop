<?php
$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root' ,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$mailUser = $_POST['mailUser'];
$passwordUser = $_POST['passwordUser'];

$mdp_hache = password_hash($_POST['passwordUser'], PASSWORD_DEFAULT);

$req= $pdo->prepare('INSERT INTO user(mailUser, passwordUser) 
                    VALUES(:mailUser, :passwordUser)');
$req->execute(array(
    'mailUser' => $mailUser,
    'passwordUser' => $mdp_hache
));
header('location:user.php');