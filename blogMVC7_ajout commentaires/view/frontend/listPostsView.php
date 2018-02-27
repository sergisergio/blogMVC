<?php $title = 'STEP 7'; ?>

<?php ob_start(); ?>
<h1> Step 7 : Ajouter des commentaires</h1>
<btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/nouvelle-fonctionnalite-ajouter-des-commentaires" target="_blank">Ajout commentaires</a></btn>
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
                        <p>1) Ecrire le modèle (et créer au besoin des tables en base).<br>
                            2) Ecrire le contrôleur, pour récupérer les informations et les envoyer à la vue.<br>
                            3) Ecrire la vue, pour afficher les informations.<br>
                            4) Mettre à jour le routeur puis envoyer vers le bon contrôleur.<br>
                        </p>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog7_1.png" class="img-responsive"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Ecriture du modèle</h2>
                        <p>Il faut penser à récupérer en paramètres les informations dont on a besoin.<br>
                        - l'ID du billet auquel se rapporte le commentaire.<br>
                        - le nom de l'auteur.<br>
                        - le contenu du commentaire.<br><br>
                            Le reste des informations (l'ID du commentaire, la date) sera généré automatiquement.<br>
                        </p>
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog7_2.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Ecriture du contrôleur</h2>
                        <br><br>
                        <p>Le contrôleur controller/frontend.php récupère lui aussi les informations dont on a besoin (id du billet, auteur, commentaire) et les transmet au modèle.<br>
                        <br>
                            On teste le retour de la requête : si il y a une erreur, on arrête tout (avec un die).
                        </p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog7_3.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Mise à jour de la vue</h2>
                        <br><br>
                        <p>Dans le fichier view/frontend/postView.php, il faut ajouter le formulaire pour pouvoir ajouter des commentaires.<br>
                        Il faut bien écrire l'URL vers laquelle le formulaire est censé envoyer.<br>On appelle une action addComment et il faut maintenant écrire le routeur qui appelle le contrôleur.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog7_4.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Mise à jour du routeur</h2>
                        <br><br>
                        <p>On ajoute un elseif dans le routeur index.php pour appeler le nouveau routeur addComment.<br><br>
                            Si on a bien un ID de billet, mais aussi si un nom d'auteur et un message ont bien été envoyés, on appelle le contrôleur addComment qui appelle le modèle pour enregistrer les informations en base...
                        </p>
                    </div>
                </div>
                <hr>
                

            </div>
        </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>