<?php $this->title = "Inscription"; ?>

<div class="login-form">
    <form action="../public/index.php?route=register" method="post">
        <h2 class="text-center">Create Account</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="pseudo" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Create an Account</button>
        </div>   
    </form>
</div>


<form method="post" action="../public/index.php?route=register">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br>
    <label for="password">Mot de passe</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Inscription" id="submit" name="submit">
</form>