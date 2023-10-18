<?php
$nameCategory = $_POST['nameCategory'];

$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root'); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $pdo->prepare("
    INSERT INTO category(nameCategory)
    VALUES(:nameCategory)
");

$sth->execute(array(
    ':nameCategory' => $nameCategory
));
header('location:admin.php');