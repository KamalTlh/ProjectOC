<?php $this->title = "Connexion"; ?>
<?= $this->session->show('error_login'); ?>
<div class="login-form">
    <form method="post" action="../public/index.php?route=login">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="userlog" class="form-control" placeholder="Pseudo ou Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="../public/index.php?route=createUser">Créer un compte</a></p>
</div>
