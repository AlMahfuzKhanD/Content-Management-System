<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 04-Nov-18
 * Time: 1:25 PM
 */

session_start();

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");


?>