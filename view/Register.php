<?php $this->title = "Inscription"; ?>

<div class="login-form">
    <form method="post" action="../public/index.php?route=register">
        <h2 class="text-center">Create Account</h2>       
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Create an Account</button>
        </div>   
    </form>
</div>
