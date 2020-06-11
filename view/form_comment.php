<?php
$route = isset($comment) && $comment->getId() ? 'updateComment&commentId='.$comment->getId() : 'addComment&articleId='.$article->getId();
$submit = $route === 'addComment&articleId='.$article->getId() ? 'Envoyer' : 'Mettre à jour';
$pseudo = isset($comment) && $comment->getPseudo() ? htmlspecialchars($comment->getPseudo()) : '';
$content = isset($comment) && $comment->getContent() ? htmlspecialchars($comment->getContent()) : '';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?= $pseudo; ?>"><br>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= $content; ?></textarea><br>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

