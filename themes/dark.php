<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $website_name; ?></title>
        <link rel="icon" href="<?php echo $website_icon; ?>" />
        <meta name="description" content="<?php echo $website_description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body style="display:flex;align-items:center;justify-content:center;background-color: #222;color: white;">
        <div id="page" style="padding:20px;width:600px;margin-top:20px;">
            <h2><?php echo $website_name; ?></h2>
            <p><?php echo $website_description; ?></p>

            <div id="projects">
            <?php while($selection = $select_content->fetch()) {?>
                <div class="card" style="margin-top: 10px;background-color: #333;">
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: 1.25rem;"><?php echo $selection['title']; ?></h2>
                        <p class="card-text"><?php echo $selection['description']; ?></p>
                        <a href="<?php echo $selection['link']; ?>" class="btn btn-<?php echo $default_bootstrap_color; ?>"><?php echo $selection['btnname']; ?></a>
                    </div>
                </div>
            <?php } ?>
            </div>

            <p style="margin-top: 20px; margin-bottom: 20px; opacity:50%;">Built with portflowio.</p>
        </div>
    </body>
</html>
