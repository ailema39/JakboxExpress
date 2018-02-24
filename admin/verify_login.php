<?php

/**
 * @author lolkittens
 * @copyright 2015
 */

if(!isset($_COOKIE["jak-user-logged-in"]) || $_COOKIE["jak-user-logged-in"]==0){
    header("Location: ./login.php");
    exit();
}

?>
