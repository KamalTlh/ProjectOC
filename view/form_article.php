<?php
$route = isset($article) && $article->getId() ? 'updateArticle&articleId='.$article->getId() : 'createArticle';
$submit = $route === 'createArticle' ? 'Envoyer' : 'Mettre à jour';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= $content; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="hidden" id="name_img" name="name_img" value="<?= $title; ?>"><br>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>