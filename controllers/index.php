<?php

require($ROOT . 'modeles/user.php');
require($ROOT . 'modeles/montage.php');

function signup($bdd)
{
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        addMember($_POST, $bdd);
    }

    require('view/affichageSignup.php');
}
function signin($bdd)
{
    //echo "POST['submit'] = " . $_POST['submit'] . "<br>" ;

    if ((empty($_POST['pseudo']) || empty($_POST['password'])) && isset($_POST['submit']))
    {
	    $_SESSION['error'] = "Champs incomplets";
        echo "erreur session: " . $_SESSION['error'];
    }
    else if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['submit']) )
    {
        echo "going to connect member...";
        connectMember($_POST, $bdd);
    }

}
function signout($bdd)
{
    echo "signing out...";
    $_SESSION = array();
    echo "result - >" . session_destroy() . "la";
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    $_SESSION['loggedin'] = false;
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