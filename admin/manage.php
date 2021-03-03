<?php
    session_start();
    include '../config.php';
    include '../lang/' . $website_language . '.php';
    require "../boot.php";

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
        <div id="page" style="width: 800px;position:relative;">
            <h2><?php echo $lang_manage_title; ?></h2>
            <p><?php echo $lang_manage_description; ?></p>
            <a href="add.php"><button type="button" class="btn btn-success"><?php echo $lang_manage_btn_add; ?></button></a>
            <a href="logout.php"><button type="button" style="position:absolute;right:0;" class="btn btn-outline-danger"><?php echo $lang_manage_btn_logout; ?></button></a><br>
            <br>
            <table class="table table-hover">
                <thead style="background-color:#888;color:#fff;">
                    <tr>
                        <td scope="col"><?php echo $lang_manage_table_id; ?></td>
                        <td scope="col"><?php echo $lang_manage_table_title; ?></td>
                        <td scope="col"><?php echo $lang_manage_table_description; ?></td>
                        <td scope="col"><?php echo $lang_manage_table_link; ?></td>
                        <td scope="col"><?php echo $lang_manage_table_btnname; ?></td>
                        <td scope="col"><?php echo $lang_manage_table_actions; ?></td>
                    </tr>
                </thead>
                <?php while($selection = $select_content->fetch()) {?>
                <tr>
                    <td><?php echo $selection['id']; ?></td>
                    <td><?php echo $selection['title']; ?></td>
                    <td><?php echo $selection['description']; ?></td>
                    <td><?php echo $selection['link']; ?></td>
                    <td><?php echo $selection['btnname']; ?></td>
                    <td><a href="edit.php?id=<?php echo $selection['id']; ?>"><?php echo $lang_manage_action_edit; ?></a><br><a href="delete-c.php?id=<?php echo $selection['id']; ?>"><?php echo $lang_manage_action_delete; ?></a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
