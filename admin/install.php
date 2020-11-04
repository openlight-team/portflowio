<?php
function form_step1()
{
    global $lang_website_language, $lang_next_step;
?>
    <form method="post">
        <div class="form-group">
            <label for="input-website-lang"><?php echo $lang_website_language; ?></label>
            <select name="website_lang" id="input-website-lang" class="form-control">
                <?php
                    $langs = array_diff(scandir("../lang"), array('..', '.'));
                    foreach ($langs as $lang) {
                        $lang = str_replace(".php", "", $lang);
                        echo "<option value=$lang>$lang</option>";
                    }
                ?>
            </select>
        </div>
        <button name="submitted_step" type="submit" value="1" class="btn btn-primary"><?php echo $lang_next_step; ?></button>
    </form>
<?php
}
?>

<?php
function form_step2()
{
    global $lang_db_host, $lang_db_name, $lang_db_user, $lang_db_password, $lang_db_table, $lang_next_step;
?>
    <form method="post">
        <div class="form-group">
            <label for="input-db-host"><?php echo $lang_db_host; ?></label>
            <input name="db_host" id="input-db-host" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input-db-name"><?php echo $lang_db_name; ?></label>
            <input name="db_name" id="input-db-name" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input-db-user"><?php echo $lang_db_user; ?></label>
            <input name="db_user" id="input-db-user" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input-db-password"><?php echo $lang_db_password; ?></label>
            <input name="db_password" id="input-db-password" type="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input-db-table"><?php echo $lang_db_table; ?></label>
            <input name="db_table" id="input-db-table" type="text" class="form-control" required>
        </div>
        <button name="submitted_step" type="submit" value="2" class="btn btn-primary"><?php echo $lang_next_step; ?></button>
    </form>
<?php
}
?>

<?php
function form_step3()
{
    global $lang_credentials_hint, $lang_admin_email, $lang_admin_password, $lang_next_step;
?>

<form method="post">
    <div class="form-group">
        <label for="input-admin-email"><?php echo $lang_admin_email; ?></label>
        <input name="admin_email" id="input-admin-email" type="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="input-admin-password"><?php echo $lang_admin_password; ?></label>
        <input name="admin_password" id="input-admin-password" type="password" class="form-control" required>
    </div>
    <p class="form-text text-muted"><small><?php echo $lang_credentials_hint ?></small><p>
    <button name="submitted_step" type="submit" value="3" class="btn btn-primary"><?php echo $lang_next_step; ?></button>
    </div>
</form>

<?php
}
?>
<?php
function form_step4()
{
    global $lang_website_name, $lang_website_desc, $lang_website_theme, $lang_website_icon,
        $lang_website_color, $lang_admin_email, $lang_admin_password, $lang_next_step;
?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-website-name"><?php echo $lang_website_name; ?></label>
            <input name="website_name" id="input-website-name" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input-website-desc"><?php echo $lang_website_desc; ?></label>
            <input name="website_desc" id="input-website-desc" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input-website-theme"><?php echo $lang_website_theme; ?></label>
            <select name="website_theme" id="input-website-theme" class="form-control">
                <?php
                    $themes = array_diff(scandir("../themes"), array('..', '.'));
                    foreach ($themes as $theme) {
                        $theme = str_replace(".php", "", $theme);
                        echo "<option value=$theme>$theme</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="input-website-icon"><?php echo $lang_website_icon; ?></label>
            <input type="file" name="website_icon" id="input-website-icon" class="form-control">
            <p class="form-text text-muted">.png, .jpg or .jpeg.</p>
        </div>
        <div class="form-group">
            <label for="input-website-color"><?php echo $lang_website_color; ?></label>
            <input name="website_color" id="input-website-color" type="text" class="form-control">
        </div>
        <br>
        <button name="submitted_step" type="submit" value="4" class="btn btn-primary"><?php echo $lang_next_step; ?></button>
    </form>
<?php
}
?>

<?php

function init_db_table($name, $db_host, $db_name, $db_user, $db_password) {
    try {
        $database = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_password);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $database->prepare("
        DROP TABLE IF EXISTS `$name`;
        CREATE TABLE IF NOT EXISTS `$name` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `description` varchar(255) NOT NULL,
        `link` varchar(255) NOT NULL,
        `btnname` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
        );");
        $stmt->execute(array($name, $name));
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
}

function process_uploaded_icon($file) {
    $file_ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $target_file = "../assets/icon." . $file_ext;

    if ($file_ext == "png" || $file_ext == "jpg" || $file_ext == "jpeg") {
        if (getimagesize($file["tmp_name"]) !== false) {
            if (!move_uploaded_file($file["tmp_name"], $target_file)) {
                return false;
            }
            else {
                return $target_file;
            }
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}

function write_config_value($file, $name, $value)
{
    fwrite($file, '$' . $name . ' = "' . $value . '";' . PHP_EOL);
}

function process_step1()
{
    $config_file = fopen("../config.php", "w") or die("Couldn't create the configuration file. Please check your permissions");

    fwrite($config_file, '<?php' . PHP_EOL);
    write_config_value($config_file, "website_language", $_POST["website_lang"]);

    fclose($config_file);
}

function process_step2()
{
    init_db_table($_POST["db_table"], $_POST["db_host"], $_POST["db_name"], $_POST["db_user"], $_POST["db_password"]);

    $config_file = fopen("../config.php", "a");

    write_config_value($config_file, "database_host", $_POST["db_host"]);
    write_config_value($config_file, "database_name", $_POST["db_name"]);
    write_config_value($config_file, "database_user", $_POST["db_user"]);
    write_config_value($config_file, "database_password", $_POST["db_password"]);
    write_config_value($config_file, "database_table", $_POST["db_table"]); 

    fclose($config_file);
}

function process_step3() {
    $config_file = fopen("../config.php", "a");

    write_config_value($config_file, "admin_email", $_POST["admin_email"]);
    write_config_value($config_file, "admin_password", sha1($_POST["admin_password"]));

    fclose($config_file);
}

function process_step4()
{
    $config_file = fopen("../config.php", "a");
    if ($_FILES["website_icon"]["name"] !== "") {
        $uploadedIcon = process_uploaded_icon($_FILES["website_icon"]);
        if (!$uploadedIcon) {
            echo "<p>Couldn't upload icon. Please check it is valid.</p>";
            fclose($config_file);
            return false;
        }
        else {
            write_config_value($config_file, "website_icon", $uploadedIcon);
        }
    }

    write_config_value($config_file, "website_name", $_POST["website_name"]);
    write_config_value($config_file, "website_description", $_POST["website_desc"]);
    write_config_value($config_file, "website_theme", $_POST["website_theme"]);
    // write_config_value($config_file, "website_icon", $_POST["website_icon"]);
    write_config_value($config_file, "website_color", $_POST["website_color"]);
    write_config_value($config_file, "installed", "true");

    fclose($config_file);
    return true;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Install Portflowio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        form {
            width: 400px;
        }

        #install {
            padding: 30px;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            background-color: #ffffff;
            -webkit-box-shadow: 0px 12px 51px 0px rgba(214, 214, 214, 1);
            -moz-box-shadow: 0px 12px 51px 0px rgba(214, 214, 214, 1);
            box-shadow: 0px 12px 51px 0px rgba(214, 214, 214, 1);
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <!-- Install form -->
    <div id="install">
        <img src="logo.png" style="height:30px;margin-bottom:30px;">
        <?php
        include "../config.php";
        if (!isset($installed)) {
            if (isset($_POST["submitted_step"])) {
                switch ($_POST["submitted_step"]) {
                    case 1:
                        process_step1();
                        require "../config.php";
                        require '../lang/' . $website_language . '.php';
                        form_step2();
                        break;
                    case 2:
                        require "../config.php";
                        require '../lang/' . $website_language . '.php';
                        process_step2();
                        form_step3();
                        break;
                    case 3:
                        require "../config.php";
                        require '../lang/' . $website_language . '.php';
                        process_step3();
                        form_step4();
                        break;
                    case 4:
                        require "../config.php";
                        require "../lang/" . $website_language . ".php";
                        if (!process_step4()) {form_step4();}
                        else {header("Location: login.php?message=installed");}
                }
            }
            else {
                require "../lang/en.php";
                form_step1();
            }
        }
        else {
            require "../config.php";
            require '../lang/' . $website_language . '.php';
            echo "<p>" . $lang_already_installed . "</p>";
        }
        ?>
    </div>

</body>

</html>