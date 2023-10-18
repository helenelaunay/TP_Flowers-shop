<?php
$id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root'); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $pdo->prepare("SELECT *, nameCategory FROM product INNER JOIN category ON product.idCategory = category.idCategory WHERE idProduct=$id");
$sth->execute();
$product = $sth->fetchAll();
$product = $product[0];


$sth = $pdo->prepare("SELECT * FROM category");
$sth->execute();
$category = $sth->fetchAll();
?>

<html>
    <h2>Mettre à jour un produit</h2>
    <form action="updateProduct.php?id=<?=$id?>" method="post" enctype="multipart/form-data">    
        <input type="text" name="nameProduct" value="<?=$product['nameProduct']?>">
        <select name="idCategory">
            <option value="<?=$product['idCategory']?>"><?=$product['nameCategory']?></option>
                <?php foreach ($category as $value) { ?>
                    <option value="<?= $value['idCategory'] ?>"><?= $value['nameCategory'] ?></option>
                <?php } ?>
            </select>
            <input type="number" step="0.01" name="price" value="<?=$product['price']?>">
            <!-- <input type="file" name="photo" value="<?=$product['photo']?>"> -->
            <textarea name="description" cols="30" rows="10"><?=$product['description']?></textarea>
            <input type="submit" value="Mettre à jour">
    </form>
</html>