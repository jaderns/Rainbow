<html>
    <head>
        <title>Rainbow - Header</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/rainbow/style/css/style_grille.css" media="screen">   
        <link rel="stylesheet" href="/rainbow/style/css/style_main.css" media="screen">   
    </head>
    <body>

            <div class="item item1">
                <a href="/rainbow/public/index.php">
                    <img class="logo" src="photos/logo.png" alt="rainbowlogo">
                </a>
            </div>
            <div class="item item2"> 
                <a href="/rainbow/public/index.php">Accueil</a> 
                <a href="/rainbow/public/produit.php">Produit</a>
                <a href="/rainbow/public/store.php">Store</a>
            </div>
            <div class="item item3">
            <?php 

            use App\client\Login;
            use App\client\Logout;
            use App\SessionManager;

            require_once __DIR__.'/../src/SessionManager.php';

            if(null ==$client = SessionManager::loggedClient()) {
                echo '<a href="client/login.php">Se connecter</a>';
            } 
            else {
                ?>
            <p>Bonjour
                <?= $client->name();?></p>
                <p>Votre email
                <?= $client->email();?></p>
                
            <?php 
            if (1 == $client->statut()) 
            {
                echo '<a href="/rainbow/public/admin/profile-pro.php">Mon compte</a>';
            } else {
                echo '<a href="/rainbow/public/client/profile.php">Mon compte</a>';
            }
            ?>
            <a href="/rainbow/public/logout.php">log out</a>
            <?php
            }
            ?>

            </div>
  
    </body>
</html>