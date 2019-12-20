<a href="index.php">Accueil</a>
<a href="produit.php">Produit</a>
<a href="store.php">Store</a>

<p></p>
<a href="panier.php">Panier</a>

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
<a href="client/profile.php">Mon compte</a>

<a href="logout.php">log out</a>
<?php
}
?>