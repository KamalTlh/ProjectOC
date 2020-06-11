<?php $this->title = 'Ajouter un article'; ?>
<?php include('form_article.php'); ?>

<!-- WYSIWYG -->
<script type="text/javascript" src="js/tinymce/tiny.js"></script>
<script>
    onload=function(){
    tinymce.init({
        selector: 'textarea'
    });
}
</script>