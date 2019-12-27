<?php

use App\Model\Client; 
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';

if(SessionManager::loggedClient() instanceof Client) {
    header('location: ../index.php');
    exit(); 
}

    $error = null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    //ou alors=> $email = isset($_POST['email']) ? $_POST['email'] : null;
    if (null !== $email &&
        false === filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $error = "L'identifiant fourni n'est pas un email valide !\n";
    }

    if (null === $error && null!== $email) {
        $client = require __DIR__.'/../../includes/client-par-email.php';
        if ($client instanceof Client) {
             //Verif mdp 
             if (true === password_verify($password, $client->password())) {
                SessionManager::loginClient($client);
                header('location: ../index.php');
                exit();
             } else {
                
                $error = "Mauvais mdp";
            } 
        } else {
            $error = 'Aucun client avec ces informations, merci de rééssayer.';
        }    
    }
?><form method="post">
    <input type="email" name="email" placeholder="Email" value="<?= $email ?>"/>
    <input type="password" name="password" placeholder="Mot de passe"/>
    <input type="submit" value="Login" />
    <?php if (null !== $error): ?>
            <p><?= $error ?></p>
    <?php endif; ?>

<p><a href="forgot-password.php">j'ai oublié mon mot de passe</a></p>

<p>OR <a href="signup.php">Create account</a></p>

</form>
