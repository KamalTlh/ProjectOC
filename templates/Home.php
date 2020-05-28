<?php
use App\src\DAO\ArticleDAO;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <h2><a href="../public/index.php?route=addArticle">Ajouter un article</a></h2>
    <?php
    $articleDAO = new ArticleDAO();
    $articles = $articleDAO->getArticles();
    foreach ($articles as $article){
        ?>
        <div>
            <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
            <p><?= htmlspecialchars($article->getContent());?></p>
            <p><?= htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?= htmlspecialchars($article->getDate_Creation());?></p>
        </div>
        <br>
        <?php
    }
    ?>
</div>
</body>
</html>