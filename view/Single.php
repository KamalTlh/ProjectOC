<?php $this->title = "Article"; ?>
<h2><a href="../index.php?route=deleteArticle&articleId=<?= htmlspecialchars($article->getId());?>">Supprimer article</a></h2>
<hr/>
<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getDate_Creation());?></p>
</div>
<hr/>
<a href="../public/index.php">Retour à l'accueil</a>
<hr/>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <?php
    foreach($comments as $comment){
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDate_Creation());?></p>
        <?php
    }
    ?>
</div>
