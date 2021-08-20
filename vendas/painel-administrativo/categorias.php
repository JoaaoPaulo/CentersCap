<?php   
    include('cabecalho.php'); 
    include("conexao.php");
    include("sessao-block.php");
    // include("verificacao-sessao-usuario.php");
?>
<div id="Principal">
    <div>

        <h2>
            Adicionar Categorias
        </h2>

        <section class="form">

            <form action="../DAO/inserir-categoria.php" method="POST">

                <h1>Inserir Categoria</h1>
                <input type="text" placeholder="Categoria" name="txCategoria">
                <input type="submit" value="Salvar">

            </form>
        </section>

        <section class="form1">
            <form action="../DAO/categoria-alterar.php" method="POST">

                <h1>
                    Alterar Categoria
                </h1>
                <input
                    type="hidden"
                    placeholder="ID"
                    name="txId"
                    value="<?php echo @$_GET['id']?>">
                <input
                    type="text"
                    placeholder="Categoria"
                    name="txCategoria"
                    value="<?php echo @$_GET['categoria']?>">

                <input type="submit" value="Salvar">

            </form>
            <br>
        </section>
    </div>

    <div>

        <section >

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Alterar Categoria</th>
                        <th scope="col">Excluir Categoria</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            
                try{
                    $stmt = $pdo -> prepare("select * from tbCategoria");       

                    $stmt ->execute();

                    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                        echo "<tr>";
                            echo "<td>$row[idCategoria]</td>";
                            echo "<td>$row[categoria]</td>";

                            echo "<td>";
                            echo "<a href='?id=$row[idCategoria]&categoria=$row[categoria]'>";
                                echo "Alterar";
                            echo "</a>";
                            echo "</td>";
                        
                        echo "<td><a href='../DAO/excluir-categoria.php?id=" . $row['idCategoria'] . "'>Excluir</a></td>";
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

<?php  include('rodape.php'); ?>