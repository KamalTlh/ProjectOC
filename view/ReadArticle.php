<?php $this->title = "Article"; ?>
<p><?= $this->session->show('add_comment'); ?></p>
<p><?= $this->session->show('update_comment'); ?></p>
<p><?= $this->session->show('flag_comment'); ?></p>

<!-- Post Content Column -->

<!-- Title -->
<h1 class="mt-4"><?= htmlspecialchars($article->getTitle());?></h1>

<!-- Author -->
<p class="lead">
    par Jean Forteroche
</p>

<hr>

<!-- Date/Time -->
<p>Publié le <?= htmlspecialchars($article->getDate_Creation());?></p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="img/<?= htmlspecialchars($article->getTitle());?>.jpg" alt="">

<hr>

<!-- Post Content -->
<p class="lead"><?= htmlspecialchars($article->getContent());?></p>
<hr>
<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Laisser un commentaire:</h5>
    <div class="card-body">
        <?php include('CreateComment.php'); ?>
    </div>
</div>
<?php
foreach($comments as $comment){
    ?>
    <!-- Single Comment -->
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0"><?= htmlspecialchars($comment->getPseudo());?></h5>
            <?= htmlspecialchars($comment->getContent());?>
        </div>
        <p>Publié le <?= htmlspecialchars($article->getDate_Creation());?></p>
    </div>
    <p class="flag"><a href="../public/index.php?route=flagComment&commentId=<?= htmlspecialchars($comment->getId());?>">Signaler le commentaire</a></p>
    <hr>
    <?php
}
?>
