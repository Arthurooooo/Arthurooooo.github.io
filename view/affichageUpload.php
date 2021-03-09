<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <h3>Envoi d'une image</h3>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=50 />
         <input type="submit" value="Envoyer" />
      </form>
   </body>
</html>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>