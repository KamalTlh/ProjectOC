<?php $this->title = "Connexion"; ?>
<form method="post" action="../public/index.php?route=login">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br>
    <label for="password">Mot de passe</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Connexion" id="submit" name="submit">
</form>

<div class="login-form">
    <form action="../public/index.php?route=login" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="pseudo" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>
