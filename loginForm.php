<?php
$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root' ,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$mailUser = $_POST['mailUser'];
$req = $pdo->prepare('SELECT * FROM user WHERE mailUser = :mailUser');
$req->execute(array(
    'mailUser' => $mailUser
));

$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['passwordUser'], $resultat['passwordUser']);

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
} else {
    if($isPasswordCorrect) {
        session_start();
        $_SESSION['idUseur'] = $resultat['idUseur'];
        $_SESSION['mailUser'] = $mailUser;
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
}