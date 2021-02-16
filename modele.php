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
// Insertion
$req = $bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');
$req->execute(array(
    'pseudo' => $infos['pseudo'],
    'pass' => $pass_hache,
    'email' => $infos['email']));

    $key = 0;

    $header="MIME-Version: 1.0\r\n";
    $header.='From:"[VOUS]"<votremail@mail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message='
    <html>
        <body>
            <div align="center">
                <a href="http://127.0.0.1/Tutos%20PHP/%2314%20%28Espace%20membre%29/confirmation.php?pseudo='.urlencode('zezette').'&key='.$key.'">Confirmez votre compte !</a>
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
}


function connectMember($infos, $bdd)
{
    $username = $infos['pseudo'];
    $email = $infos['email'];
    $password = $infos['password'];


    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username; // $username coming from the form, such as $_POST['username']
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