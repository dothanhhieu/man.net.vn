<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['us']);
unset($_SESSION['ht']);
unset($_SESSION['quyen']);
header('location:index.php');
?>