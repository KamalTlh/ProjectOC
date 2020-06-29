<?php
$route = isset($article) && $article->getId() ? 'updatearticle&articleId='.$article->getId() : 'createarticle';
$submit = $route === 'createarticle' ? 'Envoyer' : 'Mettre à jour';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
$content = isset($article) && $article->getContent() ? $article->getContent() : '';
?>

<form method="post" action="index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="wysiwg" name="content"><?= $content; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="hidden" id="name_img" name="name_img" value="<?= $title; ?>"><br>
    <input class="btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>