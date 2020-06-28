<?php $this->title = "Connexion"; ?>
<h6 class="session_msg"><?= $this->session->show('error_login'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('need_login'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('first_login'); ?></h6>
<div class="login-form">
    <form method="post" action="index.php?route=login">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="userlog" class="form-control" placeholder="Pseudo ou Email">
            <?= isset($errors['userlog']) ? $errors['userlog'] : ''; ?> 
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?> 
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="index.php?route=createUser">Créer un compte</a></p>
</div>
