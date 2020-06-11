<?php $this->title = "Administration";?>

<div class="container">
    <div class="table-responsive" >
    <h2 class="text-center">Articles</h2>
        <table class="table table-bordered">
            <thead>
            <tr class="">
                <th>Id</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Auteur</th>
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
                        <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
                        <td><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
                        <td><?= htmlspecialchars($article->getAuthor());?></td>
                        <td>Créé le : <?= htmlspecialchars($article->getDate_Creation());?></td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip" href="../public/index.php?route=addArticle"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip" href="../public/index.php?route=updateArticle&articleId=<?= $article->getId(); ?>" ><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="table-responsive">
        <h2 class="text-center">Commentaires signalés</h2>
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
                        <a class="edit" title="Edit" data-toggle="tooltip" href="../public/index.php?route=updapteComment&commentId=<?= $comment->getId(); ?>" ><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            </tbody>    
            <?php
            }
        ?>
        </table>
    </div>

    <div class="table-responsive">
        <h2 class="text-center">Utilisateurs</h2>
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
                    <td><p><?= htmlspecialchars($user->getId());?></p></td>
                    <td><p><?= htmlspecialchars($user->getPseudo());?></p></td>
                    <td><p><?= htmlspecialchars($user->getDate_Creation());?></p></td>
                    <td>
                        <a class="edit" title="Edit" data-toggle="tooltip" href="../public/index.php?route=updateUser&userId=<?= $user->getId(); ?>" ><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip" href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</div>

