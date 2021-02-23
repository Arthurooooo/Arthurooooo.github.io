<?php $title = 'Inscription'; ?>


<?php ini_set('display_errors', 1);error_reporting(E_ALL); 
    ?>
<?php ob_start(); ?>
    
<p>Inscription</p>

<form method="post">
   <p>
   <label>Votre pseudo</label> : <input type="text" name="pseudo" placeholder="xavxav" /><br><br>
   <label>Votre email</label> : <input type="text" name="email" placeholder="xavier75@free.fr" /><br><br>
   <label>Votre mdp</label> : <input type="password" name="password" placeholder="42forever" /><br><br>
   <label>Confirmation</label> : <input type="password" name="confirmation" placeholder="42reallyforever" /><br><br>
   </p>
   <input type='submit' value='envoyer'>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

<?php
if($_POST['password'] != $_POST['confirmation'])
{
    die("WRONGGGGGGGG");
}

?>