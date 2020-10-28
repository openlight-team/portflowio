<!DOCTYPE html>
<html>
  <head>
    <title>delnyn</title>
    <meta charset="utf-8">
    <title><?php echo $website_name; ?></title>
    <meta name="description" content="<?php echo $website_description; ?>">
    <link rel="icon" href="<?php echo $website_icon; ?>" />
    <link rel="stylesheet" type="text/css" href='https://delnyn.github.io/styles.css'>
    <link rel="shortcut icon" href="https://delnyn.github.io/imgs/icon.ico">
  </head>
  <body>
    <div id="content">
      <h1 style="color: var(--primary);"><?php echo $website_name; ?></h1>
      <p><?php echo $website_description; ?></p>
      <hr>
      <?php while($selection = $select_content->fetch()) {?>
      <h2><?php echo $selection['title']; ?></h2>
      <p><?php echo $selection['description']; ?></p>
      <button class="btnPrimary" onclick="location.href='<?php echo $selection['link']; ?>'"><?php echo $selection['btnname']; ?></button>
      <?php } ?>
      <hr>
      <p style="color: var(--gray); margin: 40px 0;">&copy; delnyn 2020 - built with portflowio</p>
  </div>
  </body>
</html>