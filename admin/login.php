<?php
    session_start();
    include '../config.php';

    if(isset($_POST['formconnexion'])) {
        if($_POST['mailconnect'] == $admin_email) {
            if(sha1($_POST['mdpconnect']) == $admin_password) {
                $_SESSION["password"]=$_POST['mdpconnect'];
                header("Location: panel.php");
            }
            else {
                $error = "Wrong password.";
            }
        }
        else {
            $error = "Unknown account.";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portflowio Admin Panel</title>
        <link rel="icon" href="../<?php echo $website_icon; ?>" />
        <meta name="description" content="Admin for Portflowio">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
            form {
                width: 400px;
            }

            #login {
                padding: 30px;
                border-radius: 10px;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                background-color:#ffffff;
                -webkit-box-shadow: 0px 12px 51px 0px rgba(214,214,214,1);
                -moz-box-shadow: 0px 12px 51px 0px rgba(214,214,214,1);
                box-shadow: 0px 12px 51px 0px rgba(214,214,214,1);
            }

            body {
                display:flex;
                align-items: center;
                justify-content: center;
                background-color:#f9f9f9;
            }
        </style>
    </head>
    <body>

        <!-- Formunlaire de connexion -->
        <div id="login">
            <img src="logo.png" style="height:30px;margin-bottom:30px;">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail adress</label>
                    <input name="mailconnect" type="email" class="form-control" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Don't worry, it's between you and me.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="mdpconnect" type="password" class="form-control">
                    <small id="mdpHelp" class="form-text text-muted">Hide your keyboard, someone's watching.</small>
                </div>
                <br>
                <input name="formconnexion" type="submit" value="Login" class="btn btn-primary">
                <small id="mdpHelp" class="form-text text-muted"><?php if(isset($error)){echo $error;} ?></small>
                <small id="mdpHelp" class="form-text text-muted">No account ? Make it in config.php!</small>
            </form>
        </div>
        <!-- Formunlaire de connexion -->

    </body>
</html>