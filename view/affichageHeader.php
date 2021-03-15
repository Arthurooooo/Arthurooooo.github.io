<?php ob_start(); ?>

    <div id="title">
        <h1><a href="index.php">Camagru</a></h1>
        <?php if ($_SESSION['loggedin'] == true): ?>
        <a id="logout" href="index.php?action=signout" >Sign out</a>
        <?php endif ?>
    </div>

<?php if($_SESSION['loggedin'] == false): ?>
<div><li><a href="index.php?action=signin" >Sign In</a></li>
</br>
<li><a href="index.php?action=signup" >Sign Up</a></li></div>
<?php else:
load_montage();
?>
<?php endif; ?>

<?php $header = ob_get_clean(); ?>