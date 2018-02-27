<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blog sans MVC</title>
    
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
    <h1>Mon super blog sans MVC!</h1>
    <btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/tp-un-blog-avec-des-commentaires" target="_blank">Lien Openclassrooms</a></btn>
    <p class="text-center">Derniers billets du blog :</p>
    <?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blogMVC;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

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
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
                    <br /> <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em> </p>
        </div>
        <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
            <hr>
            <div class="tuto">
                <h2>Tuto</h2>
                <p>Il y a 2 pages à faire :
                    <br>
                    <br> - index.php : liste des 5 derniers billets.
                    <br> - commentaires.php : affichage d'un billet et de ses commentaires.
                    <br> </p>
                <hr>
                <p> Base de données :
                    <br> nom : blogMVC
                    <br> <a href="../blogMVC.sql" download="../blogMVC.sql">Télécharger</a></p>
                <hr>
                <h4>Structure</h4> <img src="images/224272.png" class="img-responsive text-center" />
                <hr>
                <div class="container-fluid code">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4>index.php</h4> <img src="images/index.png" class="img-responsive text-center" />
                            <hr>
                            <p>1) Connexion à la base de données avec try/catch.
                                <br> 2) Requête (récupération des 5 derniers billets ordonnés par date décroissante).
                                <br> 3) Chaque billet a un lien qui transmet le numéro du billet dans l'URL.
                                <br> 4) Fermeture du curseur.
                                <br> </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4>commentaires.php</h4> <img src="images/index.png" class="img-responsive text-center" />
                            <hr>
                            <p> 1) Connexion à la base de données avec try/catch.
                                <br> 2) Récupération du billet avec une requête préparée : elle dépend d'un paramètre : l'id du billet (fourni par$_GET['billet']qu'on a reçu dans l'URL).
                                <br> 3) On récupère un seul billet donc pas besoin de boucle.
                                <br> 4) Fermeture du curseur.
                                <br> 5) Récupération de tous les commentaires liés correspondant à l'id reçu dans l'URL. 6) On ne se connecte à la base de données qu'une seule fois par page ! </p>
                        </div>
                    </div>
                </div>
                <hr> </div>
            <hr>
            <div class="ameliorations">
                <h2>Améliorations</h2>
                <h4>Formulaire d'ajout de commentaires</h4>
                <p>Sur la page commentaires, rajouter un formulaire</p>
                <img src="images/224308.png" class="img-responsive" />
                <hr>
                <h4>Utiliser les includes</h4>
                <hr>
                <h4>Vérifier si le billet existe sur la page des commentaires.
            <hr>
        </h4>
                <h4>Paginer les billets et commentaires</h4>
                <hr>
                <h4>Réaliser une interface d'administration du blog</h4>
                <btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/proteger-un-dossier-avec-un-htaccess" target="_blank">access/password</a></btn>
            </div>
</body>

</html>