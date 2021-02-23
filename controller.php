<?php

require('modele.php');

function signup($bdd)
{
    session_start();

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        addMember($_POST, $bdd);
    }

    require('view/affichageSignup.php');
}
function signin($bdd)
{
    session_start();
    //echo "POST['submit'] = " . $_POST['submit'] . "<br>" ;

    require('view/affichageSignin.php');

    if ((empty($_POST['pseudo']) || empty($_POST['password'])) && isset($_POST['submit']))
    {
	    $_SESSION['error'] = "Champs incomplets";
        echo $_SESSION['error'];
    }
    else if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['submit']) )
    {
        echo "IDJESIDJEIJIJED";
        connectMember($_POST, $bdd);
        
    }

}

function verif_process($bdd)
{
    require('view/affichageConfirmation.php');

    if (empty($_GET['pseudo']) || empty($_GET['key']))
    {
        //echo $_['pseudo'];
        die("code invalide");
    }
    else
        verify_user($bdd);
}