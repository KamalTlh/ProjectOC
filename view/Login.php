<?php $this->title = "Connexion"; ?>

<div class="login-form">
    <form method="post" action="../public/index.php?route=login">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" required="required">
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
