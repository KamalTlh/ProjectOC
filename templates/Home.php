<?php $this->title = "Accueil";
foreach ($articles as $article){
?>
<br>
<h2 class="post-title">
  <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
</h2>
<p>Posté par <?= htmlspecialchars($article->getAuthor());?> le : <?= htmlspecialchars($article->getDate_Creation());?></p>
<hr>
<?php
}
?>
<p><a href="../public/index.php?route=newArticle">Ajouter un article</a></p>