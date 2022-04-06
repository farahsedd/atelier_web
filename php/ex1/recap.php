<?php

$nom = ($_POST['nom']);
$prenom =$_POST['prenom'];
$nbSandwich = $_POST['nbSandwich'];
$adresse  = $_POST['adresse'];
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$ing=[];
if (isset($_POST['harissa'])){
    array_push($ing,'harissa') ;
}
if (isset($_POST['salade'])){
    array_push($ing,'salade') ;
}
if (isset($_POST['mayonnaise'])){
    array_push($ing,'mayonnaise') ;
}
$extension = pathinfo(basename($_FILES['cin']['name']),PATHINFO_EXTENSION);
$nomFichier = uniqid();
$path = 'uploads_dir/'.$nomFichier.'.'.$extension;
move_uploaded_file($_FILES['cin']['tmp_name'], $path);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recap Commande</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootswatch/dist/morph/bootstrap.css">
</head>
<body >
<div style="margin:50px 0 0 80px" >
    <h6>Nom: </h6>
    <div style="margin-left: 20px"><?= $nom ?> </div>
    <h6>Prenom: </h6>
    <div style="margin-left: 20px"><?= $prenom ?> </div>
    <h6>Adresse: </h6>
    <div style="margin-left: 20px"> <?= $adresse ?> </div>
    <h6>Nombre de Sandwich:</h6>
    <div style="margin-left: 20px"> <?= $nbSandwich ?> </div>
    <h6>Type: </h6>
    <div style="margin-left: 20px"><?= $type ?> </div>
    <h6>Ingredients:</h6>
    <div style="margin-left: 20px"> <?php foreach ($ing as $i){echo $i." ";} ?> </div>
    <h6>Prix:</h6>
    <div style="margin-left: 20px">
        <?php $prix = $nbSandwich * 4;
        if ($nbSandwich>=10){$prix = $prix*0.9;}
        echo $prix.' dt';?>
    </div>

</body>
</html>
