<!DOCTYPE html>
<?php 
require($ROOT . 'view/affichageHeader.php');
require($ROOT . 'view/affichageSidenav.php');
require($ROOT . 'view/affichageFooter.php');
require($ROOT . 'view/affichageMontage.php');

 ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>


        <link rel="stylesheet" href="/camagru/style.css" >
    </head>

    <body>
        <header>
            <?php
            if(isset($_SESSION['pseudo']))
                echo "hello " . $_SESSION['pseudo'];
            ?>
                <?= $header ?>
        </header>

        <main>
            <table>
                <tr>
                    <td>
                        <div class="main">
                            <?php if($_SESSION['loggedin'] == false): ?>
                            <h3 class="sub-title"><?= $content ?></h3>
                            <?php else: ?>
                            <h3 class="sub-title"><?= $cam_preview ?></h3>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td style="width: 30%;">
                        <?= $sidenav?>
                    </td>
                </tr>
            </table>
        </main>
        <footer>
        <?= $footer ?>
        </footer>
    </body>
</html>