<?php 

$email = "jaderons@hotmail.fr";
$password = $_POST['password'] ?? null;
$cpassword = $_POST['cpassword'] ?? null;
$new_password = password_hash($password, PASSWORD_DEFAULT);




if (null !== $password || null !== $cpassword) {
    require __DIR__.'/../../../includes/reset-password.php';
    if ($password !== $cpassword) {
        $error['password'] = "La confirmation du mot de passe ne correpond pas !\n";
    } else {
        header('location: reset-confirmation.php');
    }   
}

?>
<h1>Reset your password</h1>
<form method="post">
    <input type="password" name="password" placeholder="Mot de passe"/>
    <input
        type="password"
        name="cpassword"
        placeholder="Confirmez le mot de passe"/>
    <?php if (isset($error['password'])): ?>
    <p><?= $error['password'] ?></p>
    <?php endif; ?>
    <input type="submit" value="Login"/>

</form>