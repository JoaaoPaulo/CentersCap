<?php  
require ("cabecalho.php");
include('rodape.php'); 
require("sessao-block-user.php");

?>

<section id="padrao">

    <form action="../DAO/login-consulta.php" method="POST">

        <h1>Login</h1>

        <div>
            <input required="required" type="text" placeholder="E-mail" name="txEmail">
        </div>

        <div>
            <input required="required" type="password" placeholder="Senha" name="txSenha">
        </div>

        <div>
            <input class="botao" type="submit" value="Fazer login">
        </div>

    </form>

</section>