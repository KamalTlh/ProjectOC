<?php $this->title = "Profil"; ?>
<?php
$route = isset($user) && $user->getId() ? 'updateUser&userId='.$user->getId() : 'createUser';
$pseudo = isset($user) && $user->getPseudo() ? htmlspecialchars($user->getPseudo()) : '';
$email = isset($user) && $user->getEmail() ? htmlspecialchars($user->getEmail()) : '';
$password = isset($user) && $user->getPassword() ? htmlspecialchars($user->getPassword()) : '';
?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1><?= $this->session->get('pseudo'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                <h6>Upload photo...</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
            </hr><br>
            <ul class="list-group">
                <li class="list-group-item text-muted">Activités <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Commentaires</strong></span> 125
                </li>
            </ul>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="../public/index.php?route=<?= $route; ?>" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="pseudo">
                                    <h4>Pseudo</h4>
                                </label>
                                <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= $pseudo; ?>"
                                    placeholder="first name" title="enter your first name if any.">
                                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-12">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>"
                                    placeholder="you@email.com" title="enter your email.">
                                <?= isset($errors['email']) ? $errors['email'] : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                </label>
                                <a href="../public/index.php?route=updatePassword&userId=<?= $user->getId() ?>"><h4>Modifier le mot de passe</h4></a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Sauvegarder</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                    Effacer</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
                <!--/col-9-->
            </div>
            <!--/row-->
        </div>
    </div>
</div>