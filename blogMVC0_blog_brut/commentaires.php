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
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
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
            </p>
        </div>
        <div class="comments text-center">
        <h2>Commentaires</h2>
        <?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
            <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le
                <?php echo $donnees['date_commentaire_fr']; ?><a href="modify.php?commentaire=<?php echo $donnees['id']; ?>"> (Modifier)</a>
            </p>
            <p>
                <?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?>
            </p>
            <?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
            </div>
</body>

</html>