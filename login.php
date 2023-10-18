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
                <img  src="/assets/Flower-Shop-Logo.png" alt="Logo Flowers Shop">
            </div>
            <div>
                <h1>Bienvenue sur la page de connexion !</h1>
            </div>
        </div>
    </header>
<!-- Formulaire de connexion -->
<form action="loginForm.php" method="post" class="formLoginUser">
    <div class="mb-2">
        <input type="email" name="mailUser" class="form-control" placeholder="adresse mail">
    </div>
    <div class="mb-2">
        <input type="password" name="passwordUser" class="form-control" placeholder="adresse mail">
    </div>
        <input type="submit" id="btn" value="Se connecter">
    <div>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

