<html>
    <head>
        <title>Rainbow - Header</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link
            href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="/rainbow/bootstrap-4.4.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="/rainbow/style/css/style_main.css">
        <link rel="stylesheet" href="/rainbow/style/css/style_spe_3.css">

    </head>
    <body>
        <div class="container">
            <div class="navbar row">
                <a class="col-lg-2 logo" href="/rainbow/public/index.php">
                    <img  src="/rainbow/public/photos/logo.png" alt="rainbowlogo">
                </a>

                <a class=" menu col-lg-1" href="/rainbow/public/index.php">Accueil</a>
                <a class=" menu col-lg-1" href="/rainbow/public/produit.php">Produit</a>
                <a class=" menu col-lg-1" href="/rainbow/public/store.php">Store</a>

                
                    <?php 

            use App\client\Login;
            use App\client\Logout;
            use App\SessionManager;

            require_once __DIR__.'/../src/SessionManager.php';

            if(null ==$client = SessionManager::loggedClient()) {
                ?>
                 
                    
                    <div class="dropdown offset-lg-5 col-lg-2">
                        <button class="dropdown_button">
                        </button>

                        <div class="dropdown_content">
                                <a class="dropdown_content_in" href="client/login.php">Se connecter</a>
                                <a class="dropdown_content_in" href="client/signup.php">Créer un compte</a>
                        </div>
                   
                <?php
            } 
            else {
                ?>
                 <div class="dropdown offset-lg-5 col-lg-2">
                        <button class="dropdown_button">
                        </button>

                        <div class="dropdown_content">
                        <p>Bonjour, <?= $client->name();?> </p>
                               
                        
                    
                <?php 
            if (1 == $client->statut()) 
            {
                echo '<a href="/rainbow/public/admin/profile-pro.php">Mon compte</a>';
            } else {
                echo '<a href="/rainbow/public/client/profile.php">Mon compte</a>';
            }
            ?><a href="/rainbow/public/logout.php">Se déconnecter</a>
            <?php
            }
            ?>



                </div>
                </div>
            </div>
        </div>
        
    </body>

</html>