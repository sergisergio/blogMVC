<?php $title = 'STEP 7'; ?>

<?php ob_start(); ?>
    <h1 class="text-center"> Step 7 : Ajouter des commentaires</h1>
    <p class="text-center"><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
    <div class="news">
        <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>
    <h2 class="text-center">Commentaires</h2>
    <?php
        while ($comment = $comments->fetch())
        {
        ?>
        <p class="text-center"><strong><?= htmlspecialchars($comment['author']) ?></strong> le
            <?= $comment['comment_date_fr'] ?>
        </p>
        <p class="text-center">
            <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>
        <?php
        }
        ?>
            <h2 class="text-center">Ajouter un commentaire</h2>
            <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post" class="text-center">
                <div class="text-center">
                    <label for="author">Auteur</label>
                    <br />
                    <input type="text" id="author" name="author" /> </div>
                <div>
                    <label for="comment">Commentaire</label>
                    <br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" /> </div>
            </form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>