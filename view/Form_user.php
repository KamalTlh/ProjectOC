<?php
$route = isset($user) && $user->getId() ? 'updateUser&userId='.$user->getId() : 'createUser';
$submit = $route === 'createUser' ? 'Créer un compte' : 'Mettre à jour';
$pseudo = isset($user) && $user->getPseudo() ? htmlspecialchars($user->getPseudo()) : '';
$password = isset($user) && $user->getPassword() ? htmlspecialchars($user->getPassword()) : '';
?>

<div class="login-form">
    <form method="post" action="../public/index.php?route=<?= $route; ?>">
        <h2 class="text-center"><?= $submit ?></h2>       
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required" value="<?= $pseudo; ?>">
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" required="required" value="<?= $password; ?>">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"><?= $submit ?></button>
        </div>   
    </form>
</div>

