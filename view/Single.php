<?php $this->title = "Article"; ?>
<p><?= $this->session->show('add_comment'); ?></p>
<p><?= $this->session->show('update_comment'); ?></p>
<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getDate_Creation());?></p>
</div>
<hr/>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3><br/>
    <h4>Ajouter un commentaire</h4>
    <?php include('addComment.php'); ?>
    <hr/>
    <?php
    foreach($comments as $comment){
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDate_Creation());?></p>
        <p><a href="../public/index.php?route=flagComment&commentId=<?= htmlspecialchars($comment->getId());?>">Signaler le commentaire</a></p>
        <?php
    }
    ?>
</div>
