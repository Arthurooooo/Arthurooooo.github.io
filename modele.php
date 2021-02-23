<?php
function addMember($infos, $bdd)
{
    $pseudo = $infos['pseudo'];
    $email = $infos['email'];
// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = password_hash($infos['password'], PASSWORD_DEFAULT);

$sql_u = "SELECT * FROM users WHERE pseudo='$pseudo'";
$sql_e = "SELECT * FROM users WHERE email='$email'";
$res_u = $bdd->query($sql_u);
$res_e = $bdd->query($sql_e);

if ($res_u->fetch() > 0) {
  $name_error = "Sorry... username already taken";
  echo $name_error;	
}else if($res_e->fetch() > 0){
  $email_error = "Sorry... email already taken";
}
$verif_key = randomPassword();

// Insertion
$req = $bdd->prepare('INSERT INTO users(pseudo, pass, email, verif_key) VALUES(:pseudo, :pass, :email, :verif_key)');
$req->execute(array(
    'pseudo' => $infos['pseudo'],
    'pass' => $pass_hache,
    'email' => $infos['email'],
    'verif_key' => $verif_key));

    
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"le trou du cul de ton pipi"<caca@42.fr>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message='
    <html>
        <body>
            <div align="center">
                <a href="http://localhost:8888/camagru/index.php?action=confirmation&pseudo='.urlencode($pseudo).'&key='.$verif_key.'">Confirmez votre compte ma gueule !</a>
            </div>
        </body>
    </html>
    ';
    echo $infos['email'];
    try 
    {
        mail($infos['email'], "Confirmation de compte", $message, $header);
    }
    catch(Exception $e)
    {
        echo("error while sending mail");
    }


    
$sender = 'arthur.gonthiersimpsons@gmail.com';
$recipient = 'arthur.jouassain@live.fr';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}



}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function verify_user($bdd)
{
    //echo "OUI";
    $pseudo = $_GET['pseudo'];
    $key = $_GET['key'];
    $sql = "SELECT * FROM users WHERE pseudo = '$pseudo' AND verif_key = '$key'";
    $res = $bdd->query($sql);
    //echo "OUI";
    if ($res->fetch() <= 0) {
        $name_error = "Sorry... invalid confirmation code";
        echo $name_error . "<br>";
        print_r($res);
      }else{
        $email_error = "AWESOME MAN";
        $sql_validate = "UPDATE users SET validated = 1 WHERE pseudo = '$pseudo'";
        $res = $bdd->query($sql_validate);
        echo $email_error;
        $sql_valid = "";
      }
}

function connectMember($infos, $bdd)
{
    $username = $infos['pseudo'];
    $email = $infos['email'];
    $password = $infos['password'];


    $_SESSION['loggedin'] = true;
    $_SESSION['pseudo'] = $username; // $username coming from the form, such as $_POST['username']
                                           // something like this is optional, of course
        
    }

function ft_login_exist($login)
{
	$db = db_connect();
	
	$sql = $db->prepare("SELECT * FROM user WHERE login=:login");
	$sql->bindParam("login", $login, PDO::PARAM_STR);
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_OBJ);
	$db = null;
	if ($data == "")
		return true;
	else
	{
		$_SESSION['error'] = "Ce nom d'utilisateur existe d&eacute;&agrave;.";
		return false;
	}
}

function ft_mail_exist($mail)
{
	$db = db_connect();
	$sql = $db->prepare("SELECT * FROM user WHERE mail=:mail");
	$sql->bindParam("mail", $mail, PDO::PARAM_STR);
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_OBJ);
	$db = null;
	if ($data == "")
		return true;
	else
	{
		$_SESSION['error'] = "Cette adresse mail existe d&eacute;&agrave;.";
		return false;
	}
}