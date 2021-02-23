<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<p><a href="index.php">Bienvenue</a></p>
</br>

<li><a href="index.php?action=signin" >Sign In</a></li>
</br>
<li><a href="index.php?action=signup" >Sign Up</a></li>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>