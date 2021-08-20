<?php

    session_start();

    include("../painel-administrativo/conexao.php");


    // recuperacao dos valores do formulario
    $email = $_POST['txEmail'];
    $senha = sha1($_POST['txSenha']);

    // variaveis para verificacao com o banco de dados
    $emailBanco = '';
    $senhaBanco = '';

    // consulta com o banco de dados
    try{
        $stmt = $pdo -> prepare("select emailUsuario, senhaUsuario From tbUsuario where emailUsuario='$email' and senhaUsuario='$senha'");       

        $stmt ->execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
            $emailBanco = $row['emailUsuario'];
            $senhaBanco = $row['senhaUsuario'];
        }
    }
    catch(PDOException $e){
        echo "Erro: " . $e ->getMessage();
    }

    if($email == $emailBanco && $senha == $senhaBanco){

        $_SESSION['autorizacao'] = true;

        header("location: ../painel-administrativo/usuarios.php");
    }
    else{
        header("location: ../public/login.php");
    }

?>