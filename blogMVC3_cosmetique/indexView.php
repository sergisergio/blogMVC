<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>STEP 3</title>
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
    
    </style> </head>

<body>
    <h1>Step 3 : Soigner la cosmétique</h1> <btn class="btn btn-default text-center"><a href="https://openclassrooms.com/courses/adoptez-une-architecture-mvc-en-php/soigner-la-cosmetique" target="_blank">Lien Openclassrooms</a></btn>
    <ul class="text-left">
        <li>Code en anglais</li>
        <li>balise de fermeture PHP</li>
        <li>utilisation de short open tags</li>
        <li>indentation</li>
    </ul>
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
                    <br /> <em><a href="comments.php?post=<?= $data['id'] ?>">Commentaires</a></em> </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
        <hr>
        <div class="tuto">
            <p>Pour cette étape 3, tout a été traduit en anglais, y compris la base de données : le code doit être en anglais car il peut être repris par des développeurs non-francophones.<br>
                <hr>
                <p>Dans les pages ne contenant que du PHP, il ne faut pas mettre la balise de fermeture !!!!</p>
                <hr>
                <p>Short open tag : <br>
                    On remplace <span style="background:black;color:white;padding:5px;">?php echo htmlspecialchars($data['title']); ?></span> par : <br><br>
                    <span style="background:black;color:white;padding:5px">?= htmlspecialchars($data['title']) ?></span>
                </p>
                <hr>
                

            </p>
        </div>
</body>

</html>