<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
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
        <?= $content ?>
    </body>
</html>