<?php 
        require ("cabecalho.php");
        include("../painel-administrativo/conexao.php");
        ?>

<body>

    <section class="sec-produto center">

        <div>
            <h1>
                Produtos em destaque
                <a href="todos-produtos.php">
                    Ver todos
                </a>
            </h1>
        </div>

    <?php 
            try{

                if(isset($_POST['txPesquisar'])){
                    
                    $nome = $_POST['txPesquisar'];
                    $stmt = $pdo -> prepare("select * from tbProduto where titImgPro='$nome");

                }else{

                    $stmt = $pdo -> prepare("SELECT p.idProd, p.imgPro, p.titImgPro, p.titPro, c.categoria, p.descrPro, p.valorPro 
                    from tbproduto p
                    inner join tbcategoria c
                    on p.idCategoria = c.idCategoria
                    order by idProd desc limit 3");

                }

                $stmt -> execute();

                while($row = $stmt->fetch(PDO::FETCH_BOTH)){

        ?>

        <a href="produto-escolhido.php?idProduto=<?php echo $row['idProd'];?>">

            <figure class="col1-3">
                <div>
                    <img
                        src="<?php echo $row['imgPro']; ?>"
                        title="<?php echo $row['titImgPro'] ?>"/>
                </div>
                <figcaption>
                    <h2>
                        <?php echo $row['titPro'] ?>
                    </h2>
                    <p>
                        <?php echo $row['categoria'] ?>
                    </p>
                    <p>
                        <?php echo $row['descrPro'] ?>
                    </p>
                    <p>
                        <?php echo $row['valorPro'] ?>
                    </p>
                    <figcaption></figure>
                </a>

                <?php 
                    }
                    }
                    catch(PDOException $e){
                        echo "Erro: " . $e ->getMessage();
                    }    
        ?>
            </section>

        </body>

        <?php    include('rodape.php'); ?>