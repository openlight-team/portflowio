<?php
    session_start();
    include '../config.php';

    if(sha1($_SESSION["loggedIn"]) == true) {
        $loggedIn = true;
    }
    else {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portflowio | Tableau de bord</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="panel.css">
    </head>
    <body>
        <div id="page">
            <div class="alert alert-success" role="alert">
                Vous avez été connecté avec succès !
            </div>
            <br>
            <h2>Portflowio | Tableau de bord</h2>
            <p>Modifiez vos paramètres !</p>
            <br>
            <a href="add.php"><button type="button" class="btn btn-primary">Créer une carte</button><br><br></a>
            <a href="make.php"><button type="button" class="btn btn-primary">Générer "content" dans la table (Base de donnée)</button></a><br><br>
            <a href="logout.php"><button type="button" class="btn btn-primary">Se déconnecter</button></a>
        </div>
    </body>
</html>
