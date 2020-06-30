<?php
$route = isset($comment) && $comment->getId() ? 'updatecomment&commentId='.$comment->getId() : 'createcomment&articleId='.$article->getId();
$submit = $route === 'createcomment&articleId='.$article->getId() ? 'Envoyer' : 'Mettre à jour';
$placeholder_msg = $this->session->get('user_id') ? 'Laisser un commentaire' : 'Connectez vous pour laisser un commentaire';
$pseudo = isset($comment) && $comment->getPseudo() ? htmlspecialchars($comment->getPseudo()) : '';
$content = isset($comment) && $comment->getContent() ? htmlspecialchars($comment->getContent()) : '';
?>

<div class="container pb-cmnt-container">
    <div class="row">
        <div class="comment-area">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form method="post" action="index.php?route=<?= $route; ?>">
                        <textarea class="pb-cmnt-textarea" placeholder="<?= $placeholder_msg; ?>" name="content"><?= htmlspecialchars($content); ?></textarea><br>
                        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
                        <input class="btn btn-primary btn-sm"  type="submit" value="<?= $submit; ?>" id="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>