<?php 
        require ("cabecalho.php");
        include("../painel-administrativo/conexao.php");
        ?>

<body>

    <?php

        $id = $_GET['idProduto'];

    ?>

    <?php 
            try{
                $stmt = $pdo -> prepare("SELECT * from tbProduto where idProd=$id");       

                $stmt ->execute();

                while($row = $stmt->fetch(PDO::FETCH_BOTH)){

            ?>
    <section id="padrao">
        <h1>
            Produto Escolhido
        </h1>
        <figure class="col-3">
            <div>
                <img
                    src="<?php echo $row['imgPro']; ?>"
                    title="<?php echo $row['titImgPro'] ?>"/>
            </div>
            <figcaption>
                <h2>
                    <?php echo $row['titPro'] ?>
                </h2>

                <p style="background-color: #ccc;">
                    <?php echo $row['descrPro'] ?>
                </p>
                <p>
                    <?php echo $row['valorPro'] ?>
                </p>
                <figcaption></figure>
            </section>
            <?php 
                    }
                    }
                    catch(PDOException $e){
                        echo "Erro: " . $e ->getMessage();
                    }    
            ?>

        </body>
        <?php    include('rodape.php'); ?>
    </html>