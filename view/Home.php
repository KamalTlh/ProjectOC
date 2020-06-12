<?php $this->title = "Accueil"; ?>
<p><?= $this->session->show('add_article'); ?></p>
<p><?= $this->session->show('delete_article'); ?></p>
<p><?= $this->session->show('update_article'); ?></p>
<p><?= $this->session->show('delete_comment'); ?></p>
<p>
<a class="btn btn-primary float-right" href="../public/index.php?route=createUser">Inscription</a>
<a class="btn btn-primary float-right" href="index.php?route=login">Connexion</a>
<a class="btn btn-primary float-right" href="index.php?route=profilAdmin">Administration</a>
</p>
<?php
foreach ($articles as $article){
?>
<br>
<h2 class="post-title">
  <a href="index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
</h2>
<p>Posté par <?= htmlspecialchars($article->getAuthor());?> le : <?= htmlspecialchars($article->getDate_creation());?></p>
<?php
}
?>
