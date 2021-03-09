<?php ob_start(); ?>

    <div id="title">
        <h1><a href="index.php">Camagru</a></h1>
        <?php if ($_SESSION['loggedin'] == true): ?>
        <a id="logout" href="index.php?action=signout" >Sign out</a>
        <?php endif ?>
    </div>

<?php $header = ob_get_clean(); ?>