<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <?php
    if($_SESSION['loggedin'] = true)
        echo "hello" . $_SESSION['pseudo'];
    ?>
    <?= $header ?>
        <?= $content ?>
    </body>
</html>