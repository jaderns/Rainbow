<a href="/rainbow/public/index.php">Accueil</a>
<a href="/rainbow/public/produit.php">Produit</a>
<a href="/rainbow/public/store.php">Store</a>

<p></p>
<a href="/rainbow/public/panier.php">Panier</a>

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

<a href="/rainbow/public/logout.php">log out</a>
<?php
}
?>