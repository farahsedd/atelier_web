<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
<div style="margin:30px 0 30px 30px">
<form  action="" method="POST">
    <div class=" d-inline-flex flex-column justify-content-center form-group">
    <input type="text"  name="titre" placeholder="Titre" required>
    <textarea name="note" cols="25" placeholder="Note" required></textarea>
    <button type="submit" >Ajouter</button>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    </div>
</div>
</form>
<div>
    <?php
    if (!isset($_SESSION['listeNotes'])){
        $_SESSION['listeNotes']=[];
    }
    if (isset($_POST['titre']) && isset($_POST['note'])){
        $_SESSION['listeNotes'][]=['titre' => $_POST['titre'],'note' => $_POST['note']];
    }
    foreach ($_SESSION['listeNotes'] as $note):
    ?>
    <div style="margin-left: 10px; margin-bottom: 5px" class="border border-dark d-inline-flex rounded">
        <p style="padding-left: 10px; font-weight: bold"> <?= $note['titre']?></p>
        <p style="padding:0 20px 0 20px "> <?= $note['note']?> </p>
    </div>
    <?php  endforeach; ?>
</div>
</body>
</html>