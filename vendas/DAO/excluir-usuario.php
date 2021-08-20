<?php

    $idUsuario = $_GET['id'];

    include("../painel-administrativo/conexao.php");

    try{
        $stmt = $pdo ->prepare("delete from tbusuario where idUsuario= '$idUsuario'");
        $stmt -> execute();

        $pdo  = null;

        header("location:../painel-administrativo/usuarios.php");

    }
    catch(PDOException $e){
        echo "Erro: " . $e -> getMessage();
    }

?>
