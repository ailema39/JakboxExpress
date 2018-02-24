<?php
include ("./common/functions.php");
include ("./common/verify_login.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?= my_header()?>
  </head>
  <body>
    <?= top_bar(); ?>
    <?= menu(); ?>
    <div class="content">
        <div class="title">Bienvenido</div>
        <div class="add-content">
            Bienvenido al sistema administrativo

        </div>
    </div>
  </body>
</html>
