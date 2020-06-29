<?php $this->title = "Profil";
$route = isset($user) && $user->getId() ? 'updateuser&userId='.$user->getId() : 'createuser';
$pseudo = isset($user) && $user->getPseudo() ? htmlspecialchars($user->getPseudo()) : '';
$email = isset($user) && $user->getEmail() ? htmlspecialchars($user->getEmail()) : '';
$password = isset($user) && $user->getPassword() ? htmlspecialchars($user->getPassword()) : '';
?>
<h6 class="session_msg"><?= $this->session->show('password_updated'); ?></h6>

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
                <input type="file" class="text-center center-block file-upload" id="uploadAvatar">
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
                    <form class="form" action="index.php?route=<?= $route; ?>" method="post" id="registrationForm">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="pseudo">
                                    <h4>Pseudo</h4>
                                </label>
                                <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= $pseudo; ?>"
                                    placeholder="first name" title="Entrez votre pseudo.">
                                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-12">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>"
                                    placeholder="you@email.com" title="Entrez votre email.">
                                <?= isset($errors['email']) ? $errors['email'] : ''; ?>
                            </div>
                        </div>
                        <?php if ($this->session->get('role') === 'user' || $user->getPseudo() === 'Admin'){ ?>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                </label>
                                <a class="btn btn-info" href="index.php?route=updatepassword&userId=<?= $user->getId() ?>"><p class="profile_btn">Modifier le mot de passe</p></a>
                            </div>
                        </div>
                        <?php } 
                        if ($this->session->get('role') === 'user' || $user->getPseudo() != 'Admin'){ ?>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                </label>
                                <a class="btn btn-danger" href="javascript:if(confirm('&Ecirc;tes-vous sûr de vouloir supprimer ?')) document.location.href='index.php?route=deleteuser&userId=<?= $user->getId() ?>'""><p class="profile_btn">Supprimer votre compte</p></a>
                                
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-xs btn-success" type="submit" name="submit"><i class="fa fa-check" aria-hidden="true"></i>
                                    Sauvegarder</button>
                                <button class="btn btn-xs" type="reset"><i class="fa fa-repeat" aria-hidden="true"></i>
                                    Reset</button>
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