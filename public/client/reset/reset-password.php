<?php 

$selector = $_GET['selector'];
$validator = $_GET['validator'];

if (null === $selector || null === $validator) {
    echo "La demande de réinitialisation n'a pas fonctionnée, veuillez réessayer";
} else {
    if (false !== ctype_xdigit($selector) && false !== ctype_xdigit($validator)) {
        ?>

        <h1>Reset your password</h1>
        <form method="post">
            <input type="hidden" name="selector" value=" <?= $selector ?>">
            <input type="hidden" name="validator" value=" <?= $validator ?>">
            <input type="password" name="password" placeholder="Mot de passe"/>
            <input type="password" name="cpassword" placeholder="Confirmez le mot de passe"/>
            <?php if (isset($error['password'])): ?>
            <p><?= $error['password'] ?></p>
            <?php endif; ?>
            <input type="submit" value="reset password"/>
         </form>
        <?

        $selector = $_POST['selector'] ?? null;
        $validator = $_POST['validator'] ?? null;
        $password = $_POST['password'] ?? null;
        $cpassword = $_POST['cpassword'] ?? null;
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        
        
        if (null !== $password || null !== $cpassword) {
            if ($password !== $cpassword) {
                $error['password'] = "La confirmation du mot de passe ne correpond pas !\n";
            } else {
                require __DIR__.'/../../../includes/reset-password.php'; 
                //header('location: reset-confirmation.php');
            }   
        }
    } else {
        echo "Attention, La demande de réinitialisation n'a pas fonctionnée, veuillez réessayer";
    }
}



?>
