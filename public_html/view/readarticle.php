<?php $this->title = "Article"; ?>
<h6 class="session_msg"><?= $this->session->show('add_comment'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('update_comment'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('flag_comment'); ?></h6>
<?php setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro'); ?>
<!-- Title -->
<h1 class="mt-4"><?= htmlspecialchars($article->getTitle());?></h1>
<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="public/img/<?= str_replace(' ','', htmlspecialchars($article->getTitle()));?>.jpg" alt="">

<hr>

<!-- Post Content -->
<p><?= $article->getContent();?></p>
<hr>
<div class="lead">
    <p>
    <!-- Author -->
    par Jean Forteroche </br>
    <!-- Date/Time -->
    Publié le <?= htmlspecialchars(strftime("%A %d %B %Y",strtotime($article->getDate_Creation())));?></p>
</div>
<!-- Comments Form -->
<?php include('createcomment.php'); ?>
<?php
foreach($comments as $comment){
    ?>
    <!-- Single Comment -->
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0"><?= htmlspecialchars($comment->getPseudo());?></h5>
            <?php 
            if($comment->getFlag() === '0'){ ?>
            <?= htmlspecialchars($comment->getContent());?>
            <?php
            } 
            else{ ?>
            <p class="comment_moderate">Commentaire en cours de modération...</p>
            <?php } ?>
        </div>
        <p class="date_comment"><?= htmlspecialchars(strftime("%d-%m-%Y à %H:%M",strtotime($comment->getDate_Creation())));?></p>
    </div>
    <?php if($comment->getFlag() === '0'){ ?>
    <p class="flag"><a href="index.php?route=flagcomment&commentId=<?= htmlspecialchars($comment->getId());?>">Signaler le commentaire</a></p>
    <?php } ?>
    <hr>
    <?php
}
?>
