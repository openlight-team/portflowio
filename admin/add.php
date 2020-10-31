<?php
    $message = "Vous êtes connecté ! Bienvenue.";

    session_start();
    include '../config.php';

    if ($_SESSION["loggedIn"] == true) {
        $login = 1;
    }
    else {
        header("Location: login.php");
    }

    if(isset($_POST['validate'])) {
        $insert = $database->prepare("INSERT INTO " . $database_table . "(title, description, link, btnname) VALUES(?, ?, ?, ?)");
        $insert->execute(array($_POST['title'], $_POST['description'], $_POST['link'], $_POST['btnname']));
        $message = "La carte a été ajoutée.";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portflowio | Administrateur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="panel.css">
    </head>
    <body>
        <div id="page">
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
            <br>
            <h2>Ajouter une carte au site.</h2>
            <p>Ajoutes plus de contenu ! C'est pratique, non ?</p>
            <a href="panel.php">Retourner en arrière</a>
            <br><br>
            <form method="POST" action="">
                <input class="form-control" name="title" type="text" placeholder="Titre de la carte">
                <input class="form-control" name="description" type="text" placeholder="Description de la carte">
                <input class="form-control" name="link" type="text" placeholder="Lien de la carte (Ne pas oublier le http://)">
                <input class="form-control" name="btnname" type="text" placeholder="Nom du bouton">
                <input name="validate" type="submit" value="Ajouter" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>