<?php $title = 'STEP 6'; ?>

<?php ob_start(); ?>
<h1> Step 6 : Organisation en dossiers</h1>
<btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/organiser-en-dossiers" target="_blank">OC : Organisation</a></btn>
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
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <img src="public/images/blog6_1.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h2>racine du fichier</h2>
                        <br><br>
                        <p>Pour l'instant, tous les fichiers sont mélangés à la racine...<br>Il faut donc tout organiser, sinon on va vite se perdre...
                            
                            
                        </p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <img src="public/images/blog6_2.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h2>Créer les dossiers</h2>
                        <br><br>
                        <p>- index.php (routeur) : c'est le premier fichier qui sera appelé.<br>
                            - controller : le dossier qui contient nos contrôleurs.<br>
                            - view : nos vues.<br>
                            - model : notre modèle.<br>
                            - public : tous nos fichiers statiques publics (css, js, images, etc...).
                            <br><br>
                            On trouve aussi souvent un fichier vendor dans lequel on place toutes les bibliothèques tierces (tout le code qui provient d'autres personnes).
                            
                            
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <img src="public/images/blog6_3.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h2>Regrouper par sections du site</h2>
                        <br><br>
                        <p>Découpage en 2 fichiers (frontend et backend).
                            
                        </p>
                    </div>
                </div>
                

            </div>
        </div>
<hr>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>