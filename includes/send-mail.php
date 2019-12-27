<?php 

$subject = 'Le lien pour réinitialiser votre mot de passe'; 
//$message = "Pour réinitialiser votre mdp cliquez sur <a href='../public/client/reset/reset-password.php'>ce lien</a>";
$message = "Test"; 

if (null === mail($email,$subject,$message)){
    throw new RuntimeException('Erreur avec le mail !');
}
?>