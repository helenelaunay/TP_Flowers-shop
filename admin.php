<?php
session_start();
if (!$_SESSION['mailUser']) {
    header('location:login.php');
};
$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = $pdo->prepare("SELECT *, nameCategory FROM product INNER JOIN category ON product.idCategory = category.idCategory");
$sth->execute();
$product = $sth->fetchAll();

$sth = $pdo->prepare("SELECT * FROM category");
$sth->execute();
$category = $sth->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur le site de Flowers Shop !</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div id="header-container" class="header-container-admin d-flex justify-content-around align-items-center">
            <div id="header-logo">
                <img src="/assets/Flower-Shop-Logo.png" alt="Logo Flowers Shop">
            </div>
            <div>
                <h1>Bienvenue <?= $_SESSION['mailUser'] ?>!</h1>
                </nav>
            </div>
        </div>
    </header>
    <!-- Aside -->
    <aside class="d-flex justify-content-end">
        <a id="link-boutique" class="p-3" href="index.php">Aller à la boutique</a>
    </aside>
    <!-- Ajouter un produit -->
    <section id=form-addProduct>
        <h2 class="fw-bold">Ajouter un produit à la boutique</h2>
        <form action="insertProduct.php" method="post" enctype="multipart/form-data">
            <div id="container-form-addProduct" class="mb-2 d-flex flex-column">
                <input type="text" class="form-control mb-2" name="nameProduct" placeholder="Nom">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Choisir une catégorie</option>
                        <?php foreach ($category as $value) { ?>
                        <option value="<?= $value['idCategory'] ?>"><?= $value['nameCategory'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="number" step="0.01" class="form-control mb-2" name="price" placeholder="Prix">
                <div class="input-group">
                    <input type="file" class="form-control mb-2" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="photo">
                    <button class="btn btn-outline-secondary mb-2" type="button" id="inputGroupFileAddon04">Télécharger</button>
                </div>
                <textarea class="form-control mb-2" name="description" placeholder="Description" cols="10" rows="3"></textarea>
                <input type="submit" class="d-flex align-self-center" id="btn-addProduct" value="Ajouter">
            </div>
        </form>
    </section>
    <!-- Ajouter une catégorie -->
    <section>
        <h2 class="fw-bold">Ajouter une catégorie de produits</h2>
        <form id="form-addCategory" action="insertCategory.php" method="post">
            <input type="text" id="input-form-addCategory" name="nameCategory" placeholder="Nom de la catégorie">
            <input type="submit"  id="btn" value="Ajouter">
        </form>
    </section>
    <!-- Mettre à jour / Supprimer un produit -->
    <section>
        <h2 class="fw-bold">Mettre à jour / Supprimer un produit de la boutique</h2>
        <div id="productTable" >
            <table class="table table-hover">
                    <tr>      
                        <th scope="col"></th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix (en €)</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Description</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Mettre à jour</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    <tr>
                    <?php foreach ($product as $value) { ?>
                        <th scope="row"></th>
                        <td><?= $value['nameProduct'] ?></td>
                        <td><?= $value['price'] ?> </td>
                        <td> <img src="/uploads/<?= $value['photo'] ?>" width=90 height=110 alt="photo du produit"></td>
                        <td> <?= $value['description'] ?> </td>
                        <td> <?= $value['nameCategory'] ?> </td>
                        <td> <a href="/formUpdateProduct.php?id=<?= $value['idProduct'] ?>">Mettre à jour</a> </td>
                        <td><a href="/deleteProduct.php?idProduct=<?= $value['idProduct'] ?>">Supprimer</a></td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>