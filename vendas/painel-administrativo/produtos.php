<?php  
    include('cabecalho.php');
    include("conexao.php");
    include("sessao-block.php");
?>

<div class="produtos">

    <div id="Principal">
        <div>

            <h2>
                Adicinar Produtos
            </h2>

            <section class="form-prod">

                <form
                    action="../DAO/inserir-produto.php"
                    method="POST"
                    enctype="multipart/form-data">

                    <div>
                        <label>
                            Imagem
                        </label>
                        <!-- <input type="file" placeholder="Img prod" name="txImgPro"> -->
                        <input type="file" accept="image/*" name="txImgPro">
                    </div>

                    <input type="text" placeholder="Tit img prod" name="txtitImgPro">

                    <input type="text" placeholder="produto" name="txtitPro">

                    <input type="text" placeholder="id categoria" name="txCategoria">

                    <input type="text" placeholder="descricao" name="txdescrPro">

                    <input type="text" placeholder="valor" name="txvalorPro">
                    <br>
                    <br>
                    <input type="submit" value="Salvar">
                </form>

            </section>
        </div>

        <div>
            <section>
                <table class="table table-striped table-dark">

                    <thead >
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Img</th>
                            <th scope="col">Tit img Produto</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Id categoria</th>
                            <th scope="col">descrição</th>
                            <th scope="col">Valor</th>
                            
                            <th scope="col">Excluir Produto</th>
                        </tr>
                    </thead>

                    <?php

            try{
                $stmt = $pdo -> prepare("select * from tbProduto");       

                $stmt ->execute();

                while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                    echo "<tr>";
                        echo "<td>$row[idProd]</td>";
                        echo "<td>$row[imgPro]</td>";                  
                        echo "<td>$row[titImgPro]</td>";            
                        echo "<td>$row[titPro]</td>";                
                        echo "<td>$row[idCategoria]</td>"; 
                        echo "<td>$row[descrPro]</td>";
                        echo "<td>$row[valorPro]</td>";
                        
                        echo "<td><a href='../DAO/excluir-produtos.php?id=" . $row['idProd'] . "'>Excluir</a></td>";
                        
                    echo "</tr>"; 
                }
                echo "<br>";
            }
            catch(PDOException $e){
                echo "Erro: " . $e ->getMessage();
            }

            ?>

                </section>

            </div>

        </div>

    </div>

</div>
