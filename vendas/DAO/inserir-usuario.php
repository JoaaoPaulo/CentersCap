<?php

    
    $emailUsuario = $_POST['txtEmail'];
    $senhaUsuario = sha1($_POST['txtSenha']);

    date_default_timezone_set('America/Sao_Paulo');
    $dia= date('Y-m-d');


    include("../painel-administrativo/conexao.php");


    try{
        $smtp = $pdo->prepare("insert into tbUsuario values(null, '$dia', '$emailUsuario', '$senhaUsuario')");
        $smtp -> execute();

        $pdo = null;

        header("Location:../painel-administrativo/usuarios.php");
    }
    catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }

?>