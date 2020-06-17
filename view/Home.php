<?php $this->title = "Accueil"; ?>
<p><?= $this->session->show('add_article'); ?></p>
<p><?= $this->session->show('update_article'); ?></p>
<p><?= $this->session->show('delete_comment'); ?></p>
<p><?= $this->session->show('login'); ?></p>
<p><?= $this->session->show('logout'); ?></p>
<?php
foreach ($articles as $article){
  ?>
  <div class="card mb-4">
    <img class="card-img-top" src="img/<?= htmlspecialchars($article->getTitle());?>.jpg" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title"><?= htmlspecialchars($article->getTitle());?></h2>
      <p class="card-text"><?= substr($article->getContent(), 0, 150) ?> ...</p>
      <a href="index.php?route=readArticle&articleId=<?= htmlspecialchars($article->getId());?>" class="btn btn-primary">Lire l'article &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Publié le <?= htmlspecialchars($article->getDate_creation());?> par
      <p><?= htmlspecialchars($article->getAuthor());?></p>
    </div>
  </div>
  <?php
}
?>

<!-- Pagination -->
<ul class="pagination justify-content-center mb-4">
  <li class="page-item">
    <a class="page-link" href="#">&larr; Older</a>
  </li>
  <li class="page-item disabled">
    <a class="page-link" href="#">Newer &rarr;</a>
  </li>
</ul>