<?php

        include('cabecalho-index.php');
        
        include("conexao.php");

        include("sessao-block.php");

        include('rodape.php');
?>

<!-- Conteúdo -->

<header id="padrao">

    <h1>Bem vindo ao PAINEL ADMINISTRATIVO</h1>

    <ul class="menu">
        <li>
            <a href="categorias.php">Inserir Categorias</a>
        </li>
        <li>
            <a href="produtos.php">Inserir Produtos</a>
        </li>
        <li>
            <a href="usuarios.php">Inserir Usuarios</a>
        </li>

    </ul>
</nav>
</header>