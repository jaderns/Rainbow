<h1>Reset your password
</h1>

<?php 

use App\Model\Client; 

    $error = null;
    $email = $_POST['email'] ?? null;
    if (null !== $email &&
        false === filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $error = "L'identifiant fourni n'est pas un email valide !\n";
    }
    
    if (null === $error && null!== $email) {
        $client = require __DIR__.'/../../includes/client-par-email.php';
        if ($client instanceof Client) {   
            mail($email,'hello','this is the message test');
            //require __DIR__.'/../../includes/send-mail.php'; 
                //header('location: reset/reset-message.php');
                //exit();
        } else {
            $error = 'Aucun client avec ces informations, merci de rééssayer.';
        }    
    }
   
        ?>

<form method="post">
    <h2>Enter your email</h2>
    <input type="email" name="email" placeholder="Email" value="<?= $email ?>"/>
    <input type="submit" value="Receive a link to reset my password">
    <?php if (null !== $error): ?>
    <p><?= $error ?></p>
    <?php endif; ?>
</form>