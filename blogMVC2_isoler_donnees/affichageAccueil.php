<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>STEP 2</title>
        <link href="style.css" rel="stylesheet" /> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .btn-default {
    display: block !important;
    margin: 0 auto !important;
    width: 170px !important;
    margin-bottom : 60px !important;
    background :#e95325 !important;
    color : #fff !important;
    border : solid 1px #e95325 !important;
    outline: none !important;
    color: #fff;
}
        .btn-default a {
            color : #fff;
        }
        .news h3 {
            margin-bottom : 0px;
            color : #fff;
        }
    
    </style>
    </head>
        
    <body>
        <h1>Step 2 : 3 fichiers (index.php, modele.php, affichageAccueil.php)</h1><btn class="btn btn-default text-center">
        <a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/isoler-lacces-aux-donnees" target="_blank">Lien Openclassrooms</a></btn>
        <p class="text-center">Derniers billets du blog :</p>
 
        
        <?php
        while ($donnees = $req->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($donnees['titre']); ?>
                <em>le <?php echo $donnees['date_creation_fr']; ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            <br />
            <em><a href="commentaires.php?billet=<?= $donnees['id'] ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
        <hr>
        <div class="tuto">
                <h2>Tuto</h2>
                <p>Il y a 3 pages à faire :
                    <br>
                    <br> - index.php : fait le lien entre modèle et affichage.
                    <br> - affichageAccueil.php : affichage des données dans la page.
                    <br> - modele.php : se connecte à la base de données et récupère les billets.
                    <br><br>
                        - Une quatrième page commentaires.php a été rajoutée. </p>
                        <br><br>
                        <p style="background: black; color: white;">
                            - Le modèle traite les données.<br>
                            - La vue affiche les informations.<br>
                            - Le contrôleur fait le lien entre les 2.    
                        </p>
                <hr>
                <p> Base de données :
                    <br> nom : blogMVC
                    <br> <a href="../blogMVC.sql" download="../blogMVC.sql">Télécharger</a></p>
                
                <hr>
                <div class="container-fluid code">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4>index.php</h4> <img src="images/blog2_1.png" class="img-responsive text-center" />
                            <hr>
                            <p>Le contrôleur </p>
                            <p>1) Chargement du fichier modèle
                                <br> 2) Appel de la fonction getBillets () qui se trouve dans modele.php. On y récupère la liste des billets dans la variable $req.
                                <br> 3) Chargement de la vue.
                                <br> </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4>modele.php</h4> <img src="images/blog2_2.png" class="img-responsive text-center" />
                            <hr>
                            <p> 1) Le fichier modele.php contient une fonction getBillets() qui renvoie la liste des billets.
                                 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p> La page <strong>affichageAccueil.php</strong> n'a pas du tout changé.</p>
                    
                    <h4>Pour l'ajout du lien "commentaires, j'ai dû procéder comme ceci :<br></h4>
                    <hr>
                    <img src="images/blog2_3.png" class="img-responsive" />
                        </div>
                    </div>
                </div>
                
                
            </div>
    </body>
</html>