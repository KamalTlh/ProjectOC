<?php include('form_comment.php'); ?>
<!-- WYSIWYG -->
<script type="text/javascript" src="js/tinymce/tiny.js"></script>
<script>
    onload=function(){
    tinymce.init({
        selector: 'textarea'
    });
}
</script>