<?php
if (!isset($_COOKIE["jak-user-logged-in"]) || $_COOKIE["jak-user-logged-in"] == "0" ){
    header("Location: ../admin/login.php");
    exit();
}
