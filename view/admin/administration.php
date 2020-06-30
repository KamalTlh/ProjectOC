<h6 class="session_msg"><?= $this->session->show('delete_article'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('update_article'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('delete_comment'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('unflag_comment'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('account_delete'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('account_created'); ?></h6>
<<<<<<< HEAD
<h6 class="session_msg"><?= $this->session->show('user_updatedByAdmin'); ?></h6>

=======
>>>>>>> 0187154296ae75768aa7c77ecdea2c888ad279df

<nav class="nav nav-tabs">
    <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Articles</a>
    <a class="nav-item nav-link" href="#p2" data-toggle="tab">Commentaires</a>
    <a class="nav-item nav-link" href="#p3" data-toggle="tab">Utilisateurs</a>
</nav>
<div class="tab-content">
    <div class="tab-pane active" id="p1">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <h2 class="text-center">Articles</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
<<<<<<< HEAD
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Auteur</th>
=======
                            <th>Titre<i class="fa fa-sort"></i></th>
                            <th>Contenu</th>
                            <th>Auteur<i class="fa fa-sort"></i></th>
>>>>>>> 0187154296ae75768aa7c77ecdea2c888ad279df
                            <th>Date publication</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
            foreach ($articles as $article)
            {
            ?>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($article->getId());?></td>
                            <td><?= htmlspecialchars($article->getTitle());?></td>
<<<<<<< HEAD
                            <td><?= substr(htmlspecialchars(strip_tags($article->getContent())), 0, 50);?></td>
=======
                            <td><?= substr(htmlspecialchars($article->getContent()), 0, 50);?></td>
>>>>>>> 0187154296ae75768aa7c77ecdea2c888ad279df
                            <td>Jean Forteroche</td>
                            <td>Créé le : <?= htmlspecialchars($article->getDate_Creation());?></td>
                            <td>
                                <a href="index.php?route=readarticle&articleId=<?= htmlspecialchars($article->getId());?>"
                                    class="view" title="Lire" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a class="edit" title="Modifier" data-toggle="tooltip"
                                    href="index.php?route=updatearticle&articleId=<?= htmlspecialchars($article->getId()); ?>"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Supprimer" data-toggle="tooltip" 
                                    href="javascript:if(confirm('&Ecirc;tes-vous sûr de vouloir supprimer ?')) document.location.href='index.php?route=deletearticle&articleId=<?= 
                                        htmlspecialchars($article->getId()); ?>'"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
        }
        ?>
                </table>
                <a class="btn btn-primary" title="Créer" data-toggle="tooltip"
                    href="index.php?route=createarticle">Créer un nouvel article</a>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="p2">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <h2 class="text-center">Commentaires</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Pseudo</th>
                            <th>Contenu</th>
                            <th>Date publication</th>
                            <th>Signalement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    foreach($comments as $comment){
                    ?>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($comment->getId());?></td>
                            <td><?= htmlspecialchars($comment->getPseudo());?></td>
                            <td><?= htmlspecialchars($comment->getContent());?></td>
                            <td><?= htmlspecialchars($comment->getDate_Creation());?></td>
                            <td><?= $comment->getFlag() === '0' ? 'Non' : 'Oui'; ?></td>
                            <td>
                                <a class="view" title="Lire" data-toggle="tooltip"
                                    href="index.php?route=readarticle&articleId=<?= htmlspecialchars($comment->getArticle_Id()); ?>"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a class="edit" title="Modifier" data-toggle="tooltip"
                                    href="index.php?route=updatecomment&commentId=<?= htmlspecialchars($comment->getId()); ?>"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Supprimer" data-toggle="tooltip" 
                                    href="javascript:if(confirm('&Ecirc;tes-vous sûr de vouloir supprimer ?')) document.location.href='index.php?route=deletecomment&commentId=<?= 
                                        htmlspecialchars($comment->getId()); ?>'"><i class="material-icons">&#xE872;</i></a>
                                <a class="unflag" title="Designaler" data-toggle="tooltip"
                                    href="index.php?route=unflagcomment&commentId=<?= htmlspecialchars($comment->getId()); ?>"><i
                                        class="material-icons">&#xe578;</i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
                ?>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="p3">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <h2 class="text-center">Utilisateurs</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Date creation</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($users as $user){
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <p><?= htmlspecialchars($user->getId());?></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($user->getPseudo());?></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($user->getEmail());?></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($user->getDate_Creation());?></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($user->getRoleName($user->getRole_Id())); ?></p>
                            </td>
                            <td>
                                <a class="view" title="Lire" data-toggle="tooltip"
                                    href="index.php?route=profile&userId=<?= htmlspecialchars($user->getId()); ?>"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a class="edit" title="Modifier" data-toggle="tooltip"
                                    href="index.php?route=profile&userId=<?= htmlspecialchars($user->getId()); ?>"><i
                                        class="material-icons">&#xE254;</i></a>
                                <?php if($user->getRoleName($user->getRole_Id()) != 'admin') { ?>
                                <a class="delete" title="Supprimer" data-toggle="tooltip"
                                    href="javascript:if(confirm('&Ecirc;tes-vous sûr de vouloir supprimer ?')) document.location.href='index.php?route=deleteuser&userId=<?= 
                                        htmlspecialchars($user->getId()); ?>'"><i class="material-icons">&#xE872;</i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
                <a class="btn btn-primary" title="Créer" data-toggle="tooltip" href="index.php?route=createuser">Créer
                    un nouvel utilisateur</a>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.0/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
