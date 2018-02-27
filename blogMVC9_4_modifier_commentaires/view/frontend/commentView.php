<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
 
 
<h2>Editer le commentaire</h2>
 
<form action="index.php?action=edit&amp;id=<?= $commentID ?>" method="post">
        <label for="newComment">Nouveau commentaire</label><br />
        <textarea id="newComment" name="newComment" value = ""></textarea>
    </div>
    <div>
        <input type="Submit" />
    </div>
</form>
<?php
$content = ob_get_clean(); ?>
 
<?php require('template.php'); ?>