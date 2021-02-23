<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <?php 
            require('view/affichageHeader.php');
            if(isset($_SESSION['pseudo']))
                echo "hello " . $_SESSION['pseudo'];
            ?>
                <?= $header ?>
        </header>
        <main>
            <?= $content ?>
        <footer>
        </footer>
    </main>
    </body>
</html>