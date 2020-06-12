<?php 
$this->title = "Administration";
$this->section = "Articles"
?>
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
                <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"
                    class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                <a class="add" title="Add" data-toggle="tooltip" href="../public/index.php?route=addArticle"><i
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