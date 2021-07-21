<?php
// if (session_status() == PHP_SESSION_NONE) {
    session_start();
// }
if(isset($_SESSION['a']))
{
    echo $_SESSION['a'];
}
$_SESSION['a']='123';

?>