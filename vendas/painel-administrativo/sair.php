<?php
// LIMPA E DESTRÓI AS SESSÕES

session_start();
session_unset();
session_destroy();

header("location:http://localhost/CentersCap/vendas/public/login.php");

?>