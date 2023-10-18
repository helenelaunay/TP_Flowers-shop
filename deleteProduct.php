<?php
$id = $_GET['idProduct'];
$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root'); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "DELETE FROM product WHERE idProduct=$id";
$sth = $pdo->prepare($sql);
$sth->execute();
header('location: admin.php');
?>