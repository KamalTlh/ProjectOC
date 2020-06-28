<?php $this->title = "Accueil"; ?>
<h6 class="session_msg"><?= $this->session->show('add_article'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('login'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('logout'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('account_delete'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('need_admin'); ?></h6>
<h6 class="session_msg"><?= $this->session->show('user_updated'); ?></h6>

<?php
foreach ($articles as $article){
  ?>
  <div class="card mb-3">
    <img class="card-img-top" src="public/img/<?= str_replace(' ','', htmlspecialchars($article->getTitle()));?>.jpg" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title"><?= htmlspecialchars($article->getTitle());?></h2>
      <p class="card-text"><?= substr(strip_tags($article->getContent()), 0, 150) ?> ...</p>
      <a href="index.php?route=readarticle&articleId=<?= htmlspecialchars_decode($article->getId());?>" class="btn btn-primary">Lire l'article &rarr;</a>
    </div>
  </div>
  <?php
}
?>
