<?php $this->title = 'Ajouter un article'; ?>
<form method="post" action="../index.php?route=newArticle">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"></textarea><br>
    <label for="author">Auteur</label><br>
    <input type="text" id="author" name="author"><br>
    <input type="submit" value="Envoyer" id="submit" name="submit">
</form>
<hr/>
<a href="../public/index.php">Retour à l'accueil</a>

<!-- WYSIWYG -->
<script type="text/javascript" src="js/tinymce/tiny.js"></script>
<script>
    onload=function(){
    tinymce.init({
        selector: 'textarea'
    });
}
</script>