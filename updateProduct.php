<?php

$idProduct = $_GET['id'];
$idCategory = $_POST['idCategory'];
$nameProduct = $_POST['nameProduct'];
$price = $_POST['price'];
$description = $_POST['description'];

$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root'); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $pdo->prepare("
    UPDATE product
    SET nameProduct = :nameProduct,
        idCategory = :idCategory,
        price = :price,
        description = :description
    WHERE idProduct = :idProduct
");

 $sth->execute(array(
    ':nameProduct' => $nameProduct,
    ':idCategory' => $idCategory,
    ':price' => $price,
    ':description' => $description,
    ':idProduct' => $idProduct
));
header('location: admin.php');
