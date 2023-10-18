<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=flowers-shop;port=3306',
    'root',
    'root',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sth = $pdo->prepare("SELECT * FROM user");
$sth->execute();

$users = $sth->fetchAll();

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
                <h1>Enregistrer un nouvel utilisateur</h1>
            </div>
        </div>
    </header>
    <section>
        <form action="userForm.php" method="post" class="formLoginUser d-flex flex-column align-self-center">
            <div class="mb-3">
                <input type="email" name="mailUser" class="form-control" placeholder="adresse mail">
            </div>
            <div class="mb-3">
                <input type="password" name="passwordUser" class="form-control" placeholder="adresse mail">
            </div>
            <div>
                <input type="submit" id="btn" value="Ajouter un administrateur">
            </div>
        </form>

        <div>
            <table class="table table-bordered m-5" style="width: 300px;";>
                <tr>
                    <td class="fw-bold">Listes des administateurs</td>
                </tr>
                <?php foreach ($users as $value) { ?>
                    <tr>
                        <td> <?= $value['mailUser'] ?> </td>
                    <?php } ?>
                    </tr>
            </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>