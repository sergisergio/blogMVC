<?php $title = 'STEP 9'; ?>

<?php ob_start(); ?>
<h1> Step 9 : Passage du modèle en objet</h1>
<btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/passage-du-modele-en-objet" target="_blank">POO</a></btn>
<p class="text-center">Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<hr>
        <div class="tuto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>
                        </p>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                        
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                        

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                        <br><br>
                        
                        
                    </div>
                </div>
                <hr>
                

            </div>
        </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>