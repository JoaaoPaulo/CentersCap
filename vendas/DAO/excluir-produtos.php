<?php

    $idProd = $_GET['id'];

    include("../painel-administrativo/conexao.php");

    try{
        $stmt = $pdo ->prepare("delete from tbproduto where idProd='$idProd'");
        $stmt -> execute();

        $pdo  = null;

        header("location:../painel-administrativo/produtos.php");

    }
    catch(PDOException $e){
        echo "Erro: " . $e -> getMessage();
    }

?>