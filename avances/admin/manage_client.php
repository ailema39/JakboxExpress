<?php
include ("./common/functions.php");
include ("./verify_login.php");

$errorNombre = ""; $errorApellido = ""; $errorDireccion = ""; $errorMovil = ""; $errorFijo = ""; $errorCorreo = "";
$out["firstname"] = ""; $out["lastname"] = ""; $out["address"] = "";  $out["mobilephone"] = "";  $out["localphone"] = ""; $out["email"] = "";
$action = "crear"; $message = ""; $messageS = "";
$title           = "Agregar Cliente";

if (isset($_GET["id"])){
    $action = "editar";
    $id = $db->clean($_GET["id"]);
    $query = "SELECT * from client WHERE id = '$id'";
    $q = $db->dbQuery($query);
    $out["firstname"]   = $q[1]["firstname"];
    $out["lastname"]   = $q[1]["lastname"];
    $out["address"] = $q[1]["address"];
    $out["mobilephone"]  = $q[1]["mobilephone"];
    $out["localphone"]    = $q[1]["localphone"];
    $out["email"]   = $q[1]["email"];
    $title           = "Editar Cliente";

}

if (isset($_POST["crear"]) || isset($_POST["editar"]) ){
    $out["firstname"]      = $_POST["firstname"];
    $out["lastname"]      = $_POST["lastname"];
    $out["address"]    = $_POST["address"];
    $out["mobilephone"]     = $_POST["mobilephone"];
    $out["localphone"]      = $_POST["localphone"];
    $out["email"]       = $_POST["email"];

    if ($out["firstname"] == "") $errorNombre      = "Por favor, ingrese el nombre del cliente.";
    if ($out["lastname"] == "") $errorApellido      = "Por favor, ingrese el apellido del cliente.";
    if ($out["address"] == "")  $errorDireccion       = "Por favor, ingrese la dirección del cliente.";
    if ($out["email"] != "" && !filter_var($out["email"], FILTER_VALIDATE_EMAIL) === true) {
      $errorCorreo = "Por favor, ingrese el correo del cliente en un formato válido.";
    }
    if ($out["mobilephone"] == "" && $out["localphone"] == ""){
      $errorMovil      = "Por favor, ingrese al menos un número telefónico.";
      $errorFijo      = "Por favor, ingrese al menos un número telefónico.";
    } else if ($out["mobilephone"]){
      //chequear formato
      if (!preg_match("/\d{4}-\d{4}/",$out["mobilephone"])) {
        $errorMovil = "Por favor, ingrese el teléfono móvil en un formato válido.";
      }
    } else {
      //chequear formato
      if (!preg_match("/\d{3}-\d{4}/",$out["localphone"])) {
        $errorFijo = "Por favor, ingrese el teléfono fijo en un formato válido.";
      }
    }

    if ($out["firstname"] && $out["lastname"] &&  $out["address"] && ($out["mobilephone"] || $out["localphone"]) && empty($errorCorreo)
      && empty($errorMovil) && empty($errorFijo)){
        if (isset($_POST["crear"])){
            $id = @$db->dbInsert("client", $out);
            if ($id>0){
                $_SESSION["message-s"] = "El cliente fue creado exitosamente.";
                header("Location: ./clients.php");
                exit();
            }else{
                $message = "Ha ocurrido un error creando el cliente. Por favor intente más tarde.";
            }
        }else{
            $id = @$db->dbUpdate("client", $out, 'id = "'.$db->clean($_GET["id"]).'"');
            if ($id>0){
                $_SESSION["message-s"] = "El cliente fue editado exitosamente.";
                header("Location: ./clients.php");
                exit();
            }else{
                $message = "Ha ocurrido un error editando el cliente. Por favor intente más tarde.";
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
    $id = $db->dbUpdate("client", $out, 'id = "'.$db->clean($_GET["id"]).'"');
    if ($id>0){
        $_SESSION["message-s"] = "El cliente fue eliminado exitosamente.";
        header("Location: ./clients.php");
        exit();
    }else{
        $message = "Ha ocurrido un error eliminando el cliente. Por favor intente más tarde.";
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
    <?= menu("clientes"); ?>
    <div class="content">
        <div class="title"><?= $title?></div>

        <div class="err"><?= $message?></div>
        <div class="suc"><?= $messageS?></div>
        <div class="add-content">

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
                    <p><label>Direcci&oacute;n:</label>
                        <textarea name="address"><?= $out["address"]?></textarea>
                        <span class="error"><?= $errorDireccion?></span>
                    </p>
                    <p><label>Tel&eacute;fono M&oacute;vil:</label>
                        <input type="text" name="mobilephone" id="mobilephone" value="<?= $out["mobilephone"]?>"/>
                        <span class="error"><?= $errorMovil?></span>
                    </p>
                    <p><label>Tel&eacute;fono Fijo:</label>
                        <input type="text" name="localphone" id="localphone" value="<?= $out["localphone"]?>"/>
                        <span class="error"><?= $errorFijo?></span>
                    </p>
                    <p><label>Correo Electrónico:</label>
                        <input type="email" name="email" value="<?= $out["email"]?>"/>
                        <span class="error"><?= $errorCorreo?></span>
                    </p>

                    <p class="buttons">
                        <input type="submit" name="<?= $action ?>" value="Guardar"/>
                        <?php if ($action == "editar" && $_GET["id"] != $_COOKIE["jak-user-id"]) {?>
                        <input type="submit" name="eliminar" value="Eliminar"/>
                        <?php }?>
                        <a href="./clients.php" class="back">Volver</a>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
  </body>
</html>
