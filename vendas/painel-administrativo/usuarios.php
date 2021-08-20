<?php 
    include('cabecalho.php'); 
    include("conexao.php");
    include("sessao-block.php");
    
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');

?>

<div id="Principal">

    <h1>
        Tabela de Inserção de Usuario
    </h1>
    <div>
        <section class="form">
            <form action="" method="POST">

                <input
                    type="hidden"
                    placeholder="Id Usuário"
                    required="required"
                    name="txtId"
                    value="<?php echo @$_GET['idUsuario']?>">

                <input
                    type="email"
                    placeholder="Email"
                    required="required"
                    name="txtEmail"
                    maxlength="50">

                <input
                    type="password"
                    placeholder="Senha"
                    required="required"
                    name="txtSenha"
                    maxlength="50">

                <input
                    type="text"
                    name="txtData"
                    value='<?php echo $date; ?>'
                    disabled="disabled"
                    id="data">

                <input type="submit" value="Cadastrar" formaction="../DAO/inserir-usuario.php">

            </form>
        </section>

    </div>
    <div>

        <section>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Email Usuario</th>
                        <th scope="col">Excluir Usuario</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include("../painel-administrativo/conexao.php");

                try{

                    if(isset($_POST['txtPesquisar'])){

                        $nome = $_POST['txtPesquisar'];
                        $stmt = $pdo -> prepare("select * from TABELA where nomeUsuario like '%$nome%'");

                    } else{
                        $stmt = $pdo -> prepare("select * from tbusuario");
                    }

                    $stmt ->execute();

                    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                        echo "<tr>";
                        echo "<td>" . $row['idUsuario'] . "</td>";
                        echo "<td class='data' >" . $row['dtCadastro']. "</td>";
                        echo "<td>" . $row['emailUsuario']. "</td>";
                        

                        echo "<td><a href='../DAO/excluir-usuario.php?id=" . $row['idUsuario'] . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                }
                catch(PDOException $e){
                    echo "Erro: " . $e ->getMessage();
                }

                ?>

                </tbody>
            </table>

        </section>
    </div>
</div>