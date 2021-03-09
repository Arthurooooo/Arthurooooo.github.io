<?php

$ROOT = '/Applications/MAMP/htdocs/camagru/';
ini_set("display_errors", "1");
require($ROOT . 'controllers/index.php');
require($ROOT . 'controllers/montage.php');
require('config/database.php');
try
{
    $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die('Erreur : '.$e->getMessage());
}

//$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
session_start();
if(!isset($_SESSION['loggedin']))
{
    $_SESSION['loggedin'] = false;
}
    if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signup')
    {
        signup($bdd);
    }
    elseif ($_GET['action'] == 'signin')
    {
        require('view/affichageSignin.php');
        signin($bdd);
        $_SESSION['loggedin'] = true;
    }
    elseif ($_GET['action'] == 'confirmation')
    {
        echo "bitoku";
        verif_process($bdd);
    }elseif ($_GET['action'] == 'signout')
    {
        signout($bdd);
        header("Refresh:0; url=index.php");
    }
}
else
{
    require('view/affichageIndex.php');
}
?>