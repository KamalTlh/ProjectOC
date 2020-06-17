<?php $this->title = "Modifier mot de passe"; ?>
<?= $this->session->show('error_password'); ?>
<div class="login-form">
    <form method="post" action="../public/index.php?route=updatePassword&userId=<?=$userId?>">
        <h2 class="text-center">Modifier le mot de passe</h2>       
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <div class="form-group">
            <input type="password" name="verified_password" class="form-control" placeholder="Vérifier le mot de passe">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Envoyer</button>
        </div>   
    </form>
</div>
