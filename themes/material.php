<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $website_name; ?></title>
        <meta name="description" content="<?php echo $website_description; ?>">
        <link rel="icon" href="<?php echo $website_icon; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>
    <body style="display:flex;justify-content:center;">
        <div id="page" style="width:600px;margin-top:100px;">
            <h2><?php echo $website_name; ?></h2>
            <h5 style="margin-top:-10px;"><?php echo $website_description; ?></h5>

            <div id="card-loop" style="margin-top:40px;">
            <?php while($selection = $select_content->fetch()) {?>
                <div style="margin-bottom: 20px;" class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                      <h2 class="mdl-card__title-text"><?php echo $selection['title']; ?></h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <?php echo $selection['description']; ?>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                      <a href="<?php echo $selection['link']; ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo $selection['btnname']; ?>
                      </a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </body>
</html>
