<?php
include ("./common/functions.php");
include ("./verify_login.php");

$errorNombre = ""; $errorApellido = ""; $errorUsuario = ""; $errorCorreo = ""; $errorContrasena = ""; $errorContrasena2 = ""; $errorTipo = "";
$out["password"] = "";
$message = "";
$messageS = "";


if (isset($_POST["editar"]) ){
    $out["password"]  = md5($_POST["contrasena"]);
    $rContrasena        = md5($_POST["contrasena2"]);
    if ($out["password"] == "")  $errorContrasena                 = "Por favor, ingrese una contraseña.";
    if ($rContrasena == "")  $errorContrasena2                      = "Por favor, repita su contraseña.";
    if ($rContrasena != $out["password"])  $errorContrasena       = "Sus contraseñas no coinciden.";

    if ($out["password"]){
        $id = @$db->dbUpdate("user", $out, 'id = "'.$db->clean($_GET["id"]).'"');
        if ($id>0){
            /*$_SESSION["message-s"] = "La contreseña fue editada exitosamente.";
            header("Location: ./manage_user.php?id={$_GET["id"]}");
            exit();*/
            $messageS = "La contreseña fue editada exitosamente.";
        }else{
            $message = "Ha ocurrido un error editando la contraseña. Por favor intente más tarde.";
        }
    }
}

if (isset($_GET["id"])){
    $title           = "Cambiar contraseña";
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <?= my_header()?>
    <script src="./js/tinymce/tinymce.min.js"></script>
    <script>tinyMCE.init({selector:'#description',
    plugins: "code",
    toolbar: "code",
    menubar : false, statusbar: false});</script>
  </head>
  <body>
    <?= top_bar(); ?>
    <?php
    if(!isset($_GET["own"])){
    ?>
    <?= menu("usuarios"); ?>
    <?php
    } else {
    ?>
    <?= menu(""); ?>
    <?php
    }
    ?>
    <div class="content">
        <div class="title"><?= $title?></div>

        <div class="err"><?= $message?></div>
        <div class="suc"><?= $messageS?></div>
        <div class="add-content">
           <form method="post">
                <fieldset>
                    <p><label>Contraseña:</label>
                        <input type="password" name="contrasena" value=""/>
                        <span class="error"><?= $errorContrasena?></span>
                    </p>
                    <p><label>Repetir Contraseña:</label>
                        <input type="password" name="contrasena2" value=""/>
                        <span class="error"><?= $errorContrasena2?></span>
                    </p>
                    <p class="buttons">
                        <input type="submit" name="editar" value="Guardar"/>
                        <?php
                        if(!isset($_GET["own"])){
                        ?>
                        <a href="./manage_user.php?id=<?=$_GET["id"]?>" class="back">Volver</a>
                        <?php
                        }
                        ?>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
  </body>
</html>
