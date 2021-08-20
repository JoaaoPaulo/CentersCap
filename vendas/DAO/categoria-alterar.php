<?php

require("../painel-administrativo/conexao.php");

$id = $_POST['txId'];
$cat = $_POST['txCategoria'];

// echo "$id $cat";

try{
    $stmt = $pdo -> prepare ("update tbcategoria set categoria ='$cat' where idCategoria ='$id'");
    $stmt -> execute();

    echo "<script> alert('Dados alterados com sucesso'); </script>";
    echo "<script> window.location = '../painel-administrativo/categorias.php'; </script>";

}
catch(PDOException $e){
    echo "Erro: " . $e ->getMessage();
}


?>