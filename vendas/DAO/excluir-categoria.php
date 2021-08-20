<?php

    $idCategoria = $_GET['id'];

    include("../painel-administrativo/conexao.php");

    try{
        $stmt = $pdo ->prepare("delete from tbcategoria where idCategoria='$idCategoria'");
        $stmt -> execute();

        $pdo  = null;

        header("location:../painel-administrativo/categorias.php");

    }
    catch(PDOException $e){
        echo "Erro: " . $e -> getMessage();
    }

?>