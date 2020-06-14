<p><?= $this->session->show('delete_article'); ?></p>
<p><?= $this->session->show('delete_user'); ?></p>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <div class="show-entries">
                        <span>Show</span>
                        <select>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                        <span>entries</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h2 class="text-center"><b>Articles</b> Details</h2>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre<i class="fa fa-sort"></i></th>
                    <th>Contenu</th>
                    <th>Auteur<i class="fa fa-sort"></i></th>
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
                    <td><?= substr(htmlspecialchars($article->getContent()), 0, 50);?></td>
                    <td><?= htmlspecialchars($article->getAuthor());?></td>
                    <td>Créé le : <?= htmlspecialchars($article->getDate_Creation());?></td>
                    <td>
                        <a href="../public/index.php?route=readArticle&articleId=<?= htmlspecialchars($article->getId());?>"
                            class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                        <a class="add" title="Add" data-toggle="tooltip" href="../public/index.php?route=createArticle"><i
                                class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"
                            href="../public/index.php?route=updateArticle&articleId=<?= $article->getId(); ?>"><i
                                class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"
                            href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            </tbody>
            <?php
}
?>
        </table>
    </div>
</div>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <div class="show-entries">
                        <span>Show</span>
                        <select>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                        <span>entries</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h2 class="text-center"><b>Commentaires</b> Details</h2>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Pseudo</th>
                    <th>Contenu</th>
                    <th>Date publication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php
            foreach ($flagComments as $comment){
            ?>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($comment->getId());?></td>
                    <td><?= htmlspecialchars($comment->getPseudo());?></td>
                    <td><?= htmlspecialchars($comment->getContent());?></td>
                    <td><?= htmlspecialchars($comment->getDate_Creation());?></td>
                    <td>
                        <a class="view" title="View" data-toggle="tooltip"
                            href="../public/index.php?route=readArticle&articleId=<?= $comment->getArticle_Id(); ?>"><i
                        class="material-icons">&#xE417;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"
                            href="../public/index.php?route=updateComment&commentId=<?= $comment->getId(); ?>"><i
                                class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"
                            href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            </tbody>
            <?php
            }
        ?>
        </table>
    </div>
</div>


<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <div class="show-entries">
                        <span>Show</span>
                        <select>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                        <span>entries</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h2 class="text-center"><b>Utilisateurs</b> Details</h2>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Pseudo</th>
                    <th>Date création</th>
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
                        <p><?= htmlspecialchars($user->getDate_Creation());?></p>
                    </td>
                    <td>
                        <a class="view" title="View" data-toggle="tooltip"
                            href="../public/index.php?route=readUser&userId=<?= $user->getId(); ?>"><i
                        class="material-icons">&#xE417;</i></a>
                        <a class="add" title="Add" data-toggle="tooltip"
                            href="../public/index.php?route=createUser"><i
                        class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"
                            href="../public/index.php?route=updateUser&userId=<?= $user->getId(); ?>"><i
                                class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"
                            href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</div>

