<?php
session_start();
include ("class-db.php"); $db = new db();
include ("class-ui.php"); @$ui = new ui();
include ("label.php");  $ui->setLabel($label);


function my_header($upload=""){
$out =
<<<EOT
    <meta charset="utf-8"/>
    <title>Sistema Administrativo</title>
    <link rel="stylesheet" href="./css/style.css"/>
    <link href="./js/jquery-ui.css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-ui.js"></script>
    <script src="./js/common.js"></script>
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
EOT;

if ($upload != ""){
    $out .= '<script src="./js/drop.js"></script>';
}
    return $out;
}

function top_bar(){
    return
'<div class="top-bar">
        <div class="user-info">
            Bienvenido, '.$_COOKIE["jak-user-name"].' <a href="./manage_user_pass.php?id='.$_COOKIE["jak-user-id"].'&own=1" class="logout">Cambiar Contraseña</a> <a href="./?logout" class="logout">Salir</a>
        </div>
    </div>';

}

function menu($selected=""){
    $out = '<div class="menu">
        <div class="admin">Administrador</div>
        <div class="logo"><img src="../images/logo.png" alt="Logo" /></div>
        <ul>';
        if($_COOKIE["jak-user-admin"] == 1){
            $sel  = ''; if ($selected == "usuarios") $sel = "class='selected'";
            $out .= '<li><a href="./users.php" '.$sel.'>Usuarios</a></li>';
        }
        $sel  = ''; if ($selected == "clientes") $sel = "class='selected'";
        $out .= '<li><a href="./clients.php" '.$sel.'>Clientes</a></li>';
        $sel  = ''; if ($selected == "noticias") $sel = "class='selected'";
        $out .= '<li><a href="./news.php" '.$sel.'>Ventas</a></li>';
        $sel  = ''; if ($selected == "noticias") $sel = "class='selected'";
        $out .= '<li><a href="./news.php" '.$sel.'>Facturaci&oacute;n</a></li>';
        if($_COOKIE["jak-user-admin"] == 1){
          $sel  = ''; if ($selected == "jugadores") $sel = "class='selected'";
          $out .= '<li><a href="./players.php" '.$sel.'>Reportes</a></li>';
        }
        $out .= '</ul>
    </div>';
    return $out;
}

function uploadImage($path, $input){
    $format_accepted = array("png", "jpg", "jpeg");
    $uploadOk["result"] = 1;
    $target_file = $path;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Verificar el formato
    if(!in_array(strtolower($imageFileType), $format_accepted))
    {
        $uploadOk["result"] = 0;
        $uploadOk["message"] = "Formato de la imagen no válido. Formatos aceptados: .png, .jpg y .jpeg";
    }
    // Varificar algun error
    if ($uploadOk["result"] != 0) {
        if (move_uploaded_file($_FILES[$input]["tmp_name"], $target_file)) {
            $uploadOk["result"] = 1;
        } else {
            $uploadOk["result"]  = 0;
            $uploadOk["message"] = "Error al cargar imagen";
        }
    }
    return $uploadOk;

}

if (isset($_GET["logout"])){
     setcookie("jak-user-logged-in", "0", time() + 86400, "/");
     session_destroy();
     header("Location: ./login.php");
     exit();
}
