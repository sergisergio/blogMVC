<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>STEP 3</title>
	<link href="style.css" rel="stylesheet" /> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .news h3 {
            margin-bottom : 0px;
            color : #fff;
        }
</style>
    </head>
        
    <body>
        <h1>Step 3 : Soigner la cosmétique</h1>
        <p class="text-center">Derniers billets du blog :</h1>
        <p class="text-center"><a href="index.php">Retour à la liste des billets</a></p>
 
<?php
// Connexion à la base de données
try
{
	$db = new PDO('mysql:host=localhost;dbname=blogMVC;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
$req->execute(array($_GET['post']));
$data = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($data['title']); ?>
        <em>le <?php echo $data['creation_date_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($data['content']));
    ?>
    </p>
</div>

<h2 class="text-center">Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
$req->execute(array($_GET['post']));

while ($data = $req->fetch())
{
?>
<p class="text-center"><strong><?php echo htmlspecialchars($data['author']); ?></strong> le <?php echo $data['comment_date_fr']; ?></p>
<p class="text-center"><?php echo nl2br(htmlspecialchars($data['comment'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>



</body>
</html>