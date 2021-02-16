<?php
require('controller.php');
require('config/database.php');
try
{
    $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signup')
    {
        signup($bdd);
    }
    elseif ($_GET['action'] == 'signin')
    {
        signin($bdd);
    }
}


require('affichageIndex.php');

?>