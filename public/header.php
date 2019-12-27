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
    <p>Votre email
    <?= $client->email();?></p>
    <p>Votre statut
    <?= $client->statut();?></p>
    
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