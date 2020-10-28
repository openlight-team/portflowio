<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $website_name; ?></title>
        <link rel="icon" href="<?php echo $website_icon; ?>" />
        <meta name="description" content="<?php echo $website_description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="display:flex;align-items:center;justify-content:center;">
        <div id="page" style="padding:20px;width:600px;margin-top:20px;">
            <h2><?php echo $website_name; ?></h2>
            <p><?php echo $website_description; ?></p>

            <div id="projects">
            <?php while($selection = $select_content->fetch()) {?>
                <br>
                <div class="card" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $selection['title']; ?></h5>
                        <p class="card-text"><?php echo $selection['description']; ?></p>
                        <a href="<?php echo $selection['link']; ?>" class="btn btn-primary"><?php echo $selection['btnname']; ?></a>
                    </div>
                </div>
                <br>
            <?php } ?>
            </div>

            <p style="margin-top: 20px; margin-bottom: 20px; opacity:50%;">Built with portflowio</p>
        </div>
    </body>
</html>
