<?php $title = 'STEP 11'; ?>

<?php ob_start(); ?>
    <h1 class="text-center"> Step 11 : Activité </h1>
    <p class="text-center"><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
    
            <h2 class="text-center">Modifier un commentaire</h2>
            <form action="index.php?action=sendUpdatedComment&amp;id=<?= $post['id'] ?>" method="post"  class="text-center">
                <!--<div class="text-center">
                    <label for="author">Auteur</label>
                    <br />
                    <input type="text" id="author" name="author" /> </div>
                <div>-->
                    <label for="comment">Commentaire</label>
                    <br />
                    <textarea id="comment" name="comment" value="">

                    </textarea>
                </div>
                <div>
                    <input type="submit" /> </div>
            </form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>