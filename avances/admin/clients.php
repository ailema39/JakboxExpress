<?php
include ("./common/functions.php");
include ("./verify_login.php");

$query      = 'SELECT c.id, c.firstname, c.lastname, c.address, c.mobilephone, c.localphone, c.email from client c where c.isdeleted = 0';
$new        = $db->dbQuery($query);
foreach ($new as $k=>$v){
    $out[$k]["id"]             = 'JBX'.$v["id"];
    $out[$k]["nombre"]         = $v["firstname"];
    $out[$k]["apellido"]         = $v["lastname"];
    $out[$k]["direccion"]       = $v["address"];
    $out[$k]["movil"]       = $v["mobilephone"];
    $out[$k]["fijo"]       = $v["localphone"];
    $out[$k]["correo"]       = $v["email"];
    $out[$k]["accion"]         = "<a href='./manage_client.php?id={$v["id"]}'>Editar</a>";
}

$message =  (isset($_SESSION["message-s"])) ? $_SESSION["message-s"] : "" ;
unset($_SESSION["message-s"]);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
     <?= my_header()?>
  </head>
  <body>
    <?= top_bar(); ?>
    <?= menu("clientes"); ?>
    <div class="content">
        <div class="title">Clientes <a href="./manage_client.php" class="add">Añadir nuevo</a></div>
        <div class="suc"><?= $message?></div>
        <?= @$ui->buildTable($out,1,0); ?>
    </div>
  </body>
</html>
