<?php
include ("./common/functions.php");
include ("./verify_login.php");

$errorNombre = ""; $errorApellido = ""; $errorUsuario = ""; $errorCorreo = ""; $errorContrasena = ""; $errorContrasena2 = ""; $errorTipo = "";
$out["firstname"] = "";  $out["lastname"] = "";  $out["username"] = "";  $out["email"] = ""; $out["password"] = ""; $out["isadmin"] = "";
$action = "crear"; $message = ""; $messageS = "";
$title           = "Agregar Usuario";

if (isset($_GET["id"])){
    $action = "editar";
    $id = $db->clean($_GET["id"]);
    $query = "SELECT * from user WHERE id = '$id'";
    $q = $db->dbQuery($query);
    $out["firstname"]   = $q[1]["firstname"];
    $out["lastname"] = $q[1]["lastname"];
    $out["username"]  = $q[1]["username"];
    $out["email"]   = $q[1]["email"];
    $out["isadmin"]    = $q[1]["isadmin"];
    $title           = "Editar Usuario";

}

if (isset($_POST["crear"]) || isset($_POST["editar"]) ){
    $out["firstname"]      = $_POST["firstname"];
    $out["lastname"]    = $_POST["lastname"];
    $out["username"]     = $_POST["username"];
    $out["email"]      = $_POST["email"];
    if(isset($_POST["crear"])){
      $out["password"]  = md5($_POST["contrasena"]);
      $rContrasena        = md5($_POST["contrasena2"]);
      if ($out["password"] == "")  $errorContrasena       = "Por favor, ingrese una contraseña.";
      if ($rContrasena == "")  $errorContrasena2       = "Por favor, repita su contraseña.";
      if ($rContrasena != $out["password"])  $errorContrasena       = "Sus contraseñas no coinciden.";
    }
    $out["isadmin"]       = $_POST["type"];

    if ($out["firstname"] == "") $errorNombre      = "Por favor, ingrese el nombre del usuario.";
    if ($out["lastname"] == "")  $errorApellido       = "Por favor, ingrese el apellido del usuario.";
    if ($out["username"] == "") $errorUsuario      = "Por favor, ingrese el usuario.";
    if ($out["email"] == "")  $errorCorreo = "Por favor, ingrese el correo del usuario.";

    if ($out["firstname"] &&  $out["lastname"] && $out["username"] && $out["email"]){
        if (isset($_POST["crear"])){
            if ($out["password"]){
                $id = @$db->dbInsert("user", $out);
                if ($id>0){
                    $_SESSION["message-s"] = "El usuario fue creado exitosamente.";
                    header("Location: ./users.php");
                    exit();
                }else{
                    $message = "Ha ocurrido un error creando el usuario. Por favor intente más tarde.";
                }
            }
        }else{
            $id = @$db->dbUpdate("user", $out, 'id = "'.$db->clean($_GET["id"]).'"');
            if ($id>0){
                $_SESSION["message-s"] = "El usuario fue editado exitosamente.";
                header("Location: ./users.php");
                exit();
            }else{
                $message = "Ha ocurrido un error editando el usuario. Por favor intente más tarde.";
            }

        }
    }
}

if(isset($_POST["eliminar"])){
    unset($out);
    date_default_timezone_set('America/Panama');
    $out["deletiondate"] = date('Y-m-d G:i:s');
    $out["isdeleted"] = 1;
    /*$out["borrado_por"] = $_COOKIE["cov-user-id"];
    $out["fecha_borrado"] = time();*/
    $id = $db->dbUpdate("user", $out, 'id = "'.$db->clean($_GET["id"]).'"');
    if ($id>0){
        $_SESSION["message-s"] = "El usuario fue eliminado exitosamente.";
        header("Location: ./users.php");
        exit();
    }else{
        $message = "Ha ocurrido un error eliminando el usuario. Por favor intente más tarde.";
    }
}

if (isset($_SESSION["message-s"])){
    $messageS = $_SESSION["message-s"];
    unset($_SESSION["message-s"]);
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <?= my_header()?>
  </head>
  <body>
    <?= top_bar(); ?>
    <?= menu("usuarios"); ?>
    <div class="content">
        <div class="title"><?= $title?></div>

        <div class="err"><?= $message?></div>
        <div class="suc"><?= $messageS?></div>
        <div class="add-content">

           <?php if ($action == "editar"){?>
                <div class="pass">
                <a href="./manage_user_pass.php?id=<?=$_GET["id"]?>" class="cpass">Cambiar contraseña</a>
                </div>
            <?php }?>
            <form method="post">
                <fieldset>
                    <p><label>Nombre:</label>
                        <input type="text" name="firstname" value="<?= $out["firstname"]?>"/>
                        <span class="error"><?= $errorNombre?></span>
                    </p>
                    <p><label>Apellido:</label>
                        <input type="text" name="lastname" value="<?= $out["lastname"]?>"/>
                        <span class="error"><?= $errorApellido?></span>
                    </p>
                    <p><label>Usuario:</label>
                        <input type="text" name="username" value="<?= $out["username"]?>"/>
                        <span class="error"><?= $errorUsuario?></span>
                    </p>
                    <p><label>Correo Electrónico:</label>
                        <input type="email" name="email" value="<?= $out["email"]?>"/>
                        <span class="error"><?= $errorCorreo?></span>
                    </p>
                    <?php if ($action == "crear"){?>
                    <p><label>Contraseña:</label>
                        <input type="password" name="contrasena" value=""/>
                        <span class="error"><?= $errorContrasena?></span>
                    </p>
                    <p><label>Repetir Contraseña:</label>
                        <input type="password" name="contrasena2" value=""/>
                        <span class="error"><?= $errorContrasena2?></span>
                    </p>
                    <?php }?>
                    <p><label>Tipo:</label>
                        <select name="type">
                            <option value="1" <?=($out["isadmin"] == "1") ? "selected":""?>>Administrador</option>
                            <option value="0" <?=($out["isadmin"] == "0") ? "selected":""?>>Usuario</option>
                        </select>
                        <span class="error"><?= $errorTipo?></span>
                    </p>

                    <p class="buttons">
                        <input type="submit" name="<?= $action ?>" value="Guardar"/>
                        <?php if ($action == "editar" && $_GET["id"] != $_COOKIE["jak-user-id"]) {?>
                        <input type="submit" name="eliminar" value="Eliminar"/>
                        <?php }?>
                        <a href="./users.php" class="back">Volver</a>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
  </body>
</html>
