<?php

    $categoria = $_POST['txCategoria'];

    include("../painel-administrativo/conexao.php");

    try{
        $stmt = $pdo ->prepare("insert into tbCategoria values(null, '$categoria')");
        $stmt -> execute();

        $pdo  = null;

        header("location:../painel-administrativo/categorias.php");
        
    }
    catch(PDOException $e){
        echo "Erro: " . $e -> getMessage();
    }

?>