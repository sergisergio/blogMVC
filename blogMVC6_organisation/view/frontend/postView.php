<?php $title = 'STEP 6'; ?>

<?php ob_start(); ?>
        <h1 class="text-center"> Step 6 : Organisation en dossiers</h1>
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
            <p class="text-center"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p class="text-center"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>