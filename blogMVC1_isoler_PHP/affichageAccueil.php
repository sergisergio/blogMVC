<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>STEP 1</title>
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
    <h1>Step 1 : première séparation <br>(index.php et affichage Accueil.php)</h1>
    <btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/isoler-laffichage-du-traitement-php" target="_blank">Lien Openclassrooms</a></btn>
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
                    <br /> <em><a href="commentaires.php?billet=<?= $donnees['id'] ?>">Commentaires</a></em> </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
        <hr>
        <div class="tuto">
                <h2>Tuto</h2>
                <p>Il y a 2 pages à faire :
                    <br>
                    <br> - index.php : récupération des données et appel de l'affichage.
                    <br> - affichageAccueil.php : affichage des données dans la page.
                    <br><br>
                        - Une troisième page commentaires.php a été rajoutée. </p>
                <hr>
                <p> Base de données :
                    <br> nom : blogMVC
                    <br> <a href="../blogMVC.sql" download="../blogMVC.sql">Télécharger</a></p>
                
                <hr>
                <div class="container-fluid code">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4>index.php</h4> <img src="images/blog1_1.png" class="img-responsive text-center" />
                            <hr>
                            <p>1) Connexion à la base de données avec try/catch.
                                <br> 2) Requête (récupération des 5 derniers billets ordonnés par date décroissante).
                                <br> 3) appel de la page affichage Accueil.php (require(), c'est comme include() sauf que le script plante si la page n'est pas trouvée...).
                                <br> </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4>affichageAccueil.php</h4> <img src="images/blog1_2.png" class="img-responsive text-center" />
                            <hr>
                            <p> 1) LA variable $donnees est transmise par index.php grâce au require().
                                <br> 2) Boucle while pour récupérer chaque billet (titre, date, contenu) </p>
                        </div>
                    </div>
                </div>
                <hr> 
                <p> On vient de faire de la <strong>REFACTORISATION</strong> : cela signifie que l'on vient de changer le code sans ajouter de nouvelles fonctionnalités.
                    <hr>
                    <p>Pour l'ajout du lien "commentaires, j'ai dû procéder comme ceci :<br></p>
                    <img src="images/blog1_3.png" class="img-responsive" />
            </div>
</body>

</html>