<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Vote</title>
</head>
<body>
<form method="POST">
    <h3>Evaluer ce cours php:</h3>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="vote" id="bon" value="bon">
        <label for="bon">Bon</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="vote" id="moyen" value="moyen">
        <label for="moyen">Moyen</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="vote" id="mauvais" value="mauvais">
        <label for="mauvais">Mauvais</label>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
<?php if (isset($_POST['vote'])){
        if (!isset($_COOKIE['vote'])){
            ?>
            <div class="p-3 mb-2 bg-success text-white" >
                <h3>Merci d'avoir pris le temps de voter.</h3>
            </div>
        <?php }
        else{ ?>
            <div class="p-3 mb-2 bg-danger text-white">
                <h3>Vous avez déjà voter pour <?=  $_COOKIE['vote'] ?> .</h3>
            </div>
        <?php }
} ?>


</body>
</html>

<?php
if (isset($_POST['vote']) && !isset($_COOKIE['vote'])) {
    setcookie('vote',$_POST['vote'],time()+60*2);
}
?>