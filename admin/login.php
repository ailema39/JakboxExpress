<?php
include ("./common/functions.php");

$focus1 = ""; $focus2 = "";$msg = "";

$user       = "";
$password   = "";
if (isset($_POST) && isset($_POST["submit"])){
    $user       = $db->clean($_POST["user"]);
    $password   = md5($db->clean($_POST["password"]));

    if (!$user || !$password){
        if ($user=="") {$msg = "Por favor, indique su usuario." ; $focus1 = "autofocus"; $focus2 = ""; }
        else if ($password == ""){ $msg = "Por favor, indique su contraseña."; $focus1 = ""; $focus2 = "autofocus";}
    }else{
        $query = "SELECT * from user WHERE (email = '$user' OR username = '$user') AND password = '$password' ";
        $q = $db->dbQuery($query);
        if ($q){
            setcookie("jak-user-logged-in", "1", time() + 86400, "/");
            setcookie("jak-user-id", $q[1]["id"], time() + 86400, "/");
            setcookie("jak-user-admin", $q[1]["isadmin"], time() + 86400, "/");
            setcookie("jak-user-name", $q[1]["firstname"], time() + 86400, "/");
            header("Location: ./index.php");
            exit();
        }else{
            $msg        = "La combinación usuario / contraseña no es correcta."; $focus1 = ""; $focus2 = "autofocus";
            $password   = "";
        }
     }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Sistema Administrativo</title>
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="apple-touch-icon" sizes="57x57" href="../images/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="../images/apple-touch-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="../images/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="../images/apple-touch-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon-180x180.png"/>
    <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="../images/favicon-194x194.png" sizes="194x194"/>
    <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/png" href="../images/android-chrome-192x192.png" sizes="192x192"/>
    <link rel="icon" type="image/png" href="../images/favicon-16x16.png" sizes="16x16"/>
    <link rel="manifest" href="../images/manifest.json"/>
    <link rel="mask-icon" href="../images/safari-pinned-tab.svg" color="#5bbad5"/>
    <link rel="shortcut icon" href="../images/favicon.ico"/>
    <meta name="msapplication-TileColor" content="#da532c"/>
    <meta name="msapplication-TileImage" content="../images/mstile-144x144.png"/>
    <meta name="msapplication-config" content="../images/browserconfig.xml"/>
    <meta name="theme-color" content="#ffffff"/>
  </head>
  <body>
    <div class="content-login">
        <div class="header">
          <div class="logo-top">
            <img src="../images/logo.png" alt="logo"/>
          </div>
      </div>
     <form class="login" method="POST">
        <div class="error"><?= $msg ?></div>
        <fieldset>
            <div>
                <label>Correo electrónico o usuario:</label>
                <input type="text" name="user" value="<?= $user ?>" <?= $focus1?>/>
            </div>
            <div>
                <label>Contraseña:</label>
                <input type="password" name="password"  value="<?= $password ?>"  <?= $focus2?>/>
            </div>
            <div style="text-align: right;">
                <a href="" class="forgot">Olvidé mi contraseña</a>
                <input type="submit" name="submit" value="Entrar"/>
            </div>
        </fieldset>
     </form>
    </div>
  </body>
</html>
