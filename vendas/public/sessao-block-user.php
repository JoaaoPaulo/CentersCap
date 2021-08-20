<?php 

session_start();
if((isset($_SESSION['autorizacao'])==true)){
    $_SESSION['autorização'] = false;
    unset($_SESSION['autorização']);
    session_destroy();
    header("location:http://localhost/CentersCap/vendas/public/login.php");
}
?>