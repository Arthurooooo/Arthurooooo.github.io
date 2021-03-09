<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<?php if($_SESSION['loggedin'] == false): ?>
<li><a href="index.php?action=signin" >Sign In</a></li>
</br>
<li><a href="index.php?action=signup" >Sign Up</a></li>
<?php else:
load_montage();
?>
<?php endif; ?>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>