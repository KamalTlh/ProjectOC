<?php
$route = isset($user) && $user->getId() ? 'updateuser&userId='.$user->getId() : 'createuser';
$submit = $route === 'createuser' ? 'Créer un compte' : 'Mettre à jour';
$pseudo = isset($user) && $user->getPseudo() ? htmlspecialchars($user->getPseudo()) : '';
$email = isset($user) && $user->getEmail() ? htmlspecialchars($user->getEmail()) : '';
$password = isset($user) && $user->getPassword() ? htmlspecialchars($user->getPassword()) : '';
?>

<div class="login-form">
    <form method="post" action="index.php?route=<?= $route; ?>">
        <h2 class="text-center"><?= $submit ?></h2>       
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?= $pseudo; ?>">
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?> 
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $email; ?>">
            <?= isset($errors['email']) ? $errors['email'] : ''; ?>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="<?= $password; ?>">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"><?= $submit ?></button>
        </div>   
    </form>
</div>

