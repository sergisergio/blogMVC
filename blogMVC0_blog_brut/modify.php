<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blog sans MVC</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <h1>Mon super blog sans MVC!</h1>
    <p class="text-center"><a href="index.php">Retour à la liste des billets</a></p>
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

// Récupération du billet
$req = $bdd->prepare('UPDATE commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id = ?');
$req->execute(array($_GET['commentaire']));
$donnees = $req->fetch();
?>
        <div class="news">
            <h3>
        <?php echo htmlspecialchars($donnees['commentaire']); ?>
        <em>le <?php echo $donnees['date_commentaire_fr']; ?></em>
    </h3>
            <p>
            
            </p>
        </div>
        <div class="comments text-center">
        <h2>Commentaires</h2>
            <?php $req->closeCursor() ?>
        
            </div>
</body>

</html>