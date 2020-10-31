<?php
    session_start();
    include '../config.php';
    $select_content = $database->query("SELECT * FROM " . $database_table);

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
        <title>Portflowio Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="panel.css">
    </head>
    <body>
        <div id="page" style="width: 800px;">
            <h2>Manage your cards</h2>
            <p>Change the way your cards are showing.</p>
            <a href="add.php"><button type="button" class="btn btn-primary">Add a card</button></a>
            <a href="make-c.php"><button type="button" class="btn btn-primary">Generate the table in your database</button></a>
            <a href="logout.php"><button type="button" class="btn btn-primary">Log out</button></a><br>
            <br>
            <table class="table table-hover">
                <thead style="background-color:#888;color:#fff;">
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Title</td>
                        <td scope="col">Description</td>
                        <td scope="col">Link</td>
                        <td scope="col">Button's name</td>
                        <td scope="col">Actions</td>
                    </tr>
                </thead>
                <?php while($selection = $select_content->fetch()) {?>
                <tr>
                    <td><?php echo $selection['id']; ?></td>
                    <td><?php echo $selection['title']; ?></td>
                    <td><?php echo $selection['description']; ?></td>
                    <td><?php echo $selection['link']; ?></td>
                    <td><?php echo $selection['btnname']; ?></td>
                    <td><a href="edit.php?id=<?php echo $selection['id']; ?>">Edit</a><br><a href="delete-c.php?id=<?php echo $selection['id']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
