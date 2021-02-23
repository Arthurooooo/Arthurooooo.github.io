<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<p>Connexion</p>

<form method="post" >
   <p>
   <label>Votre pseudo</label> : <input type="text" name="pseudo" placeholder="xavxav" /><br><br>
   <label>Votre email</label> : <input type="text" name="email" placeholder="xavier75@free.fr" /><br><br>
   <label>Votre mdp</label> : <input type="password" name="password" placeholder="42forever" /><br><br>
   </p>
   <input type='submit' name='submit' value='envoyer'>
</form>
<a href="index.php?action=forgottenpassword">Mot de passe oublié?<br></a>

<a href="index.php?action=signup">Pas encore membre? rejoignez-nous</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
