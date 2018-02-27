<?php $title = 'STEP 5'; ?>

<?php ob_start(); ?>
<h1> Step 5 : Blog avec template.php, routeur et controller</h1>
<btn class="btn btn-default text-center" style="margin-bottom : 10px !important;"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/creer-un-template-de-page" target="_blank">OC : template de page</a></btn><br>
<btn class="btn btn-default text-center" style="margin-top : 0px !important;"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/creer-un-routeur" target="_blank">OC : Créer un routeur</a></btn>
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
            <em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog5_1.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Inclure des blocs de page</h2>
                        <br><br>
                        <p>On peut, par exemple, simplifier le code avec un include() ou un require(), le header et le footer.<br>
                            Le problème est que si le header et le titre doit varier en fonction des pages, on ne peut pas les changer.<br>
                        Pas de panique : la solution est en-dessous !</p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog5_2.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Créer un template</h2>
                        <br><br>
                        <p>On va créer un template ( aussi appelé gabarit) de page. On va y retrouver toute la structure de la page, avec des "trous" à remplir.<br><br>
                            Il y a 2 "trous" à remplir dans ce template : le title et le contenu de la page.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog5_3.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Remplir les trous</h2>
                        <br><br>
                        <p>On va maintenant définir ce qu'on met dans ces variables.<br><br>
                            1) définir le titre de la page dans $title (qui sera intégré dans la balise title dans le template).<br>
                            2) définir le contenu de la page dans $content (qui sera intégré dans la balise body du template).<br>
                            3) Appeler le template avec un require. Ce template va récupérer les variables $title et $content qu'on vient de créer..pour afficher la page.<br><br>
                            NB : La fonction obstart() mémorise toute la sortie HTML qui suit. A la fin, on récupère le contenu généré avec ob_get_clean et on met le tout dans la variable content. Ensuite on utilise cette variable $content dans le template qui va afficher le contenu...
                            
                        </p>
                    </div>
                </div>
                

            </div>
        </div>
<hr>
        <div class="tuto">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog5_1.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Nouvelle structure de fichiers</h2>
                        <br><br>
                        <p>Pour l'instant, on a 2 contrôleurs (index.php et post.php)<br>
                        Mais pour faire plus simple, il nous faut un contrôleur frontal qui va jouer le rôle de routeur. Son objectif va être d'appeler le bon controleur (il route les requêtes).<br><br>
                            On va travailler sur 2 fichiers : <br>
                            1) index.php = ROUTEUR ( il va se charger d'appeler le bon contrôleur).<br>
                            2) controller.php = anciens index.php et post.php.<br><br>
                            Dans l'URL du routeur index.php, on va faire passer un paramètre "action" pour savoir quelle page on veut appeler.<br>
                            Exemple : <br>
                            index.php?action=listPosts
                            
                            
                        </p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog5_5.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Création de controller.php</h2>
                        <br><br>
                        <p>Ici on regroupe nos contrôleurs dans des fonctions.
                            
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog5_6.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Création du routeur index.php</h2>
                        <br><br>
                        <p>Appeler le bon contrôleur : <br>
                            1) Charger le fichier controller.php (pour que les fonctions soient en mémoire).<br>
                            2) Tester le paramètre action pour savoir quel contrôleur appeler :<br><br>
                            - Ligne 18 : par défaut, on charge la liste des derniers billets.<br>
                            - Si il y a un paramètre action et si ce paramètre est égal à listPosts, alors on éxécute la fonction listPosts.<br>
                            - Sinon si il y a un paramètre action et si ce paramètre est égal à post : on a 2 options.<br>
                            a) Si il existe un identifiant et si celui-ci est supérieur à 0, alors on exécute la fonction post().<br>
                            b) Si ces conditions ne sont vas validées, on envoie un message d'erreur.
                            
                        </p>
                    </div>
                </div>
                

            </div>
        </div>
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>