<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<p><a href="index.php">Home</a></p>

<a href="index.php?action=signin" >Sign In</a>
</br>
<a href="index.php?action=signup" >Sign Up</a>

<?php $header = ob_get_clean(); ?>
<?php require('template.php'); ?>