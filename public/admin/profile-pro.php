<?php
 
 use App\Header;
 use App\SessionManager;
 
 require_once __DIR__.'/../../src/SessionManager.php';
 
 
 if(null ==$client = SessionManager::loggedClient()) {
     header('location: ../client/login.php');
     exit(); 
 }
 
 require_once __DIR__.'/../../public/header.php';
 
 ?>
 
 <h1>Profil Admin</h1>
 
 <h2>Commandes</h2>

<? $commandes = require __DIR__.'/../../includes/liste-commandes.php';
?>

<h2>Utilisateurs</h2>
<?= $clients = require __DIR__.'/../../includes/liste-clients.php';
?>

<h2>Produits</h2>

<?= $produits = require __DIR__.'/../../includes/liste-produits.php';
?>



