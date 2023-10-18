<?php
$pdo = new PDO('mysql:host=localhost;dbname=flowers-shop;port=3306', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_GET) {
if ($_GET['id']) {
  $id = $_GET['id'];
  $sth = $pdo->prepare("SELECT *, nameCategory FROM product INNER JOIN category ON product.idCategory = category.idCategory WHERE product.idCategory=$id");
  $sth->execute();
  $product = $sth->fetchAll();

  $sth = $pdo->prepare("SELECT * FROM category WHERE idCategory=$id");
  $sth->execute();
  $category = $sth->fetchAll();
}
}
else {
  $sth = $pdo->prepare("SELECT *, nameCategory FROM product INNER JOIN category ON product.idCategory = category.idCategory");
  $sth->execute();
  $product = $sth->fetchAll();
}

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="/style/style.css">
</head>
<body>
  <!-- Header -->
  <header>
    <div id="header-container">
        <div id="header-logo">
          <img src="/assets/Flower-Shop-Logo.png" alt="Logo Flowers Shop">
        </div>
        <div id="header-nav-login" class="d-flex justify-content-end">
            <div id="header-nav">
              <nav class="navbar navbar-expand-lg">
                <div class="container-fluid m-5 d-flex align-self-end">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item p-3"><a class="nav-link" aria-current="page" href="#">Nos produits</a></li>
                      <li class="nav-item p-3"><a class="nav-link" aria-current="page" href="#">FAQ</a></li>
                      <li class="nav-item p-3"><a class="nav-link" aria-current="page" href="#">Contact</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
            <div class="d-flex align-self-start m-5">
              <a href="login.php">Connexion</a>
            </div>
        </div>
    </div>
  </header>
<!-- Hero -->
  <section id=hero class="d-flex flex-column align-items-center justify-content-end">
    <h3 id="hero-title" class="text-center p-5">Flowers Shop vous propose un large choix de graines de fleurs, de bulbes, ou encore de plantes variées</h3>
    <h3 id="hero-button" class="text-center"><a href="#">Découvrir nos produits</a></h3>
  </section> 
<!-- Nos produits -->
  <section id=section-produits>
    <h1 class="text-center">Bienvenue sur notre boutique "Flowers Shop"</h1>
    <h2>Retrouvez tous nos articles, triés par catégorie</h2>
    <nav>
      <ul id="nav-category" class="d-flex justify-content-around">
        <li><a href="index.php?id=1">Graines de fleurs</a></li>
        <li><a href="index.php?id=2">Bulbes de fleurs</a></li>
        <li><a href="index.php?id=3">Plantes d'intérieur</a></li>
        <li><a href="index.php?id=4">Plantes d'extérieur</a></li>
      </ul>
    </nav>
<?php if (isset($_GET['id'])) { ?>
  <h2 class="text-center"> 
        <?php foreach ($category as $value) { 
          echo $value['nameCategory']; } ?> </h2>
<?php } ?>
        <div  class="d-flex flex-row flex-wrap justify-content-center m-5">
            <?php foreach ($product as $value) { ?> 
            <div id="product-container" class="card d-flex justify-content-around p-5 m-3" style="width: 350px;">
                <img src="/uploads/<?= $value['photo'] ?>" class="card-img-top p-3" alt="photo du produit"> 
                <p class="card-title fs-5 fw-bold p-1"> <?= $value['nameProduct'] ?> </p> 
                <p class="card-text"> <?= $value['description'] ?> </p>
                <p class="card-text fw-bold"> <?= $value['price'] ?> € </p>
            </div>
            <?php } ?>
        </div>
  </section>
<!-- Footer -->
  <footer>
    <div id="pre-footer" class="d-flex align-items-center justify-content-center">
      <p class="text-center">Ne ratez rien de notre actualité : Suivez-nous sur les réseaux !</p>
      <div id="pre-footer-icons">
          <div><i class="fa-brands fa-square-facebook"></i></div>
          <div><i class="fa-brands fa-instagram"></i></div>
          <div><i class="fa-brands fa-square-twitter"></i></div>
      </div>
    </div>
    <div id="footer-infos" class="d-flex align-items-center justify-content-around">
      <div id="footer-infos-box">
        <i class="fa-solid fa-phone"></i>
        <p>06.11.22.33.44</p>
      </div>
      <div id="footer-infos-box">
        <i class="fa-solid fa-location-dot"></i>
        <p>158 rue des coquelicots 44200 FLEURVILLE</p>
      </div>
      <div id="footer-infos-box">
        <i class="fa-regular fa-envelope"></i>
        <p>contact@flowersshop.com</p>
      </div>
    </div>
    <div id="footer-copyright">
      <p class="text-center">CGV | Mentions Légales | Plan du site -  2023 © Hélène LAUNAY. Tous droits réservés.</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>