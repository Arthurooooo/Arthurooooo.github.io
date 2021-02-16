<?php

require('modele.php');

function signup($bdd)
{
    session_start();

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        addMember($_POST, $bdd);
    }

    require('affichageSignup.php');
}
function signin($bdd)
{
    session_start();
    
    if ((empty($_POST['pseudo']) || empty($_POST['password'])) && isset($_POST['submit']))
	$_SESSION['error'] = "Champs incomplets";
    else if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['submit']) )
	    connectMember($_POST, $bdd);

    require('affichageSignin.php');
}