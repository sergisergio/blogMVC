<?php $title = 'STEP 8'; ?>

<?php ob_start(); ?>
<h1> Step 8 : Gérer les erreurs</h1>
<btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/gerer-les-erreurs-5" target="_blank">Gérer les erreurs</a></btn>
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
                        <p>Il est difficile de gérer les erreurs qui ont lieu à l'intérieur des fonctions.<br>
                            Le mieux est de remonter un erreur et laisser une partie spécialisée du code traiter l'erreur.
                        </p>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog8_1.png" class="img-responsive"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Les exceptions à la rescousse</h2>
                        <p>Les exceptions sont un moyen en programmation de gérer les erreurs. <br>
                            On voit çà avec TRY/CATCH (comme ds la connexion à la base de données).<br>
                            1) L'ordinateur essaie d'exécuter ce qui est dans le bloc TRY.<br>
                            2) Si pas d'erreur dans le bloc TRY, on saute le bloc CATCH.<br>
                            3) Si une erreur se produit dans TRY, on arrête et on va dans le CATCH pour "attraper" l'erreur.<br><br>
                            On peut afficher l'erreur qui nous a été envoyée avec $e->getMessage()<br><br>
                            Pour générer un eerreur, il faut "jeter une exception". Dès qu'il y a une erreur quelque part dans le code, onutilise cette ligne : <br><br>
                            <img src="public/images/blog8_2.png" class="img-responsive" />
                        </p>
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog8_3.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Ajout de la gestion d'exceptions dans le routeur</h2>
                        <br><br>
                        <p>A l'endroit où les erreurs se produisent, on met des "throw new Exception". Cela arrête le bloc TRY et amène directement l'ordinateur au bloc CATCH.<br>
                            <br>
                            Ici, le bloc CATCH se contente de récupérer le message d'erreur qu'on a transmis et de l'afficher...
                        </p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog8_4.png" class="img-responsive"/><br>
                        <img src="public/images/blog8_5.png" class="img-responsive"/><br>
                        <img src="public/images/blog8_6.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Remonter les exceptions</h2>
                        <br><br>
                        <p>Notre routeur appelle la fonction le contrôleur addComment. Ce contrôleur appelle une autre fonction, le modèle.<br>
                            Pour l'instant, le modèle arrête tout et affiche une erreur avec un DIE.<br><br>
                            Faisons mieux en jetant une exception : le code va s'arrêter là et l'erreur sera remontée jusque dans le routeur qui contenait le bloc TRY.<br>
                            On gère mieux l'erreur an ajoutant un throw...<br><br>
                            Ce principe de remontée de l'erreur jusqu'à l'endroit du code qui contenait le bloc try est vraiment un gros avantage des exceptions.<br><br>
                            Lorsqu'une erreur survient dans une sous-fonction, elle est remontée jusqu'au bloc catch.<br>
                            <br>
                            Du coup, dans la fonction dbConnect() de notre modèle, il n'est plus forcément nécessaire de garder un bloc TRY/CATCH. L'erreur de connexion à la base, s'il y en a, sera remontée jusqu'au routeur : <br><br></p>
                            <img src="public/images/blog8_7.png" class="img-responsive"/>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="public/images/blog8_8.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Améliorer la présentation de l'erreur</h2>
                        <br><br>
                        <p>Pour l'instant, le bloc CATCH affiche une erreur avec un simple ECHO, mais mieux encore, on pourrait appeler une vue ERRORVIEW.PHP qui affiche mieux le message d'erreur.
                        </p>
                        
                    </div>
                </div>
                <hr>
                

            </div>
        </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>