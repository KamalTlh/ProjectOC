<?php
use App\src\DAO\ArticleDAO;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajouter un article</title>
</head>

<body>
<header>
    <h1>Ajouter un nouvel article</h1>
</header>
<div>
    <form method="post" action="../public/index.php?route=addArticle">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"></textarea><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author"><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
</div>
<?php
if(isset($_POST)){
$articleDAO = new ArticleDAO();
$articleDAO->addArticle();
}
?>
<a href="../public/index.php">Retour à l'accueil</a>
<!-- WYSIWYG -->
<script type="text/javascript" src="js/tinymce/tiny.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'  // change this value according to your HTML
    });
</script>
</body>
</html>