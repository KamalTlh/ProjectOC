<?php
$route = isset($comment) && $comment->getId() ? 'updateComment&commentId='.$comment->getId() : 'createComment&articleId='.$article->getId();
$submit = $route === 'createComment&articleId='.$article->getId() ? 'Envoyer' : 'Mettre à jour';
$pseudo = isset($comment) && $comment->getPseudo() ? htmlspecialchars($comment->getPseudo()) : '';
$content = isset($comment) && $comment->getContent() ? htmlspecialchars($comment->getContent()) : '';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= $content; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

