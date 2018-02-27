<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>STEP 4</title>
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
        li {
            list-style-type: none;
        }
        hr {
    margin-top: 50px !important;
    margin-bottom: 50px !important;
    border: 0 !important;
    border-top: 3px solid #e95325 !important;
}
    
    </style>
    </head>
        
    <body>
        <h1>Step 4 : Afficher des commentaires et code MVC plus clair</h1>
        <btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/nouvelle-fonctionnalite-afficher-des-commentaires" target="_blank">Lien Openclassrooms</a></btn>
       
        <p class="text-center">Derniers billets du blog :</p>
 
        
        <?php
        while ($data = $req->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']); ?>
                <em>le <?= $data['creation_date_fr']; ?></em>
            </h3>
            
            <p>
            <?= nl2br(htmlspecialchars($data['content']));
            ?>
            <br />
            <em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
        <hr>
        <div class="tuto">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog4_1.png" class="img-responsive"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Le modèle</h2>
                        <p>On avait déjà la fonction getPosts qui récupère tous les derniers posts deblog</p>
                        <p>Ici on ajoute 2 fonctions :<br><br>
                            La fonction getPost qui récupère un post précis en fonction de son ID.<br>
                            La fonction getComments qui récupère les commentaires associés à un ID de post.
                            <br><br>
                            Ces 2 nouvelles fonctions prennent un paramètre : l'id du post qu'on recherche. Cela nous permet notamment de ne sélectionner que les commentaires liés au post concerné.
                            <br><br>
                            Aussi, au lieu d'avoir à répéter le code de connexion à la base de données, on crée une fonction dbConnect() qui va renvoyer la connexion à la base de données...</p>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog4_2.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Nouveau contrôleur pour les commentaires</h2>
                        <br><br>
                        <p>On avait déjà un contrôleur index.php pour gérer la liste des derniers billets.<br>
                            On crée maintenant un autre contrôleur post.php qui affiche un post et ses commentaires.<br><br>
                            Ce contrôleur vérifie qu'on a bien reçu en paramètre un id dans l'URL ( $_GET['id'] ).<br><br>
                            Si c'est bon, il appelle les 2 fonctions du modèle : gestPost et getComments.<br><br>On récupère çà dans des variables, qui seront réutilisées dans la vue postView.php.</p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/blog4_3.png" class="img-responsive"/>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>Création de la vue des commentaires</h2>
                        <br><br>
                        <p>On affiche le billet créé avec $post et les commentaires créés avec $comments.</p>
                    </div>
                </div>
                <hr>
                <p class="text-center">
                    On a donc maintenant 5 fichiers :<br><br>
                    <h4>Modèle</h4>
                    <p>- model.php (fonctions pour récupérer les infos dans la base).</p><br>
                    <h4>Vue</h4>
                    <p>- indexView.php (vue de la page d'accueil).</p>
                    <p>- postView.php (vue d'un billet et ses commentaires).</p><br>
                    <h4>Contrôleur</h4>
                    <p>- index.php (contrôleur de la page d'accueil).</p>
                    <p>- post.php (contrôleur d'un billet et ses commentaires).</p>
                </p>
                <hr>

            </div>
        </div>
    </body>
</html>