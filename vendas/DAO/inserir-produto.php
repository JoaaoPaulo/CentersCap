<?php

    include("../painel-administrativo/conexao.php");

    $imgPro = $_POST['txImgPro'];
    $titImgPro = $_POST['txtitImgPro'];
    $titPro = $_POST['txtitPro'];
    $idCategoria = $_POST['txCategoria'];
    $descrPro = $_POST['txdescrPro'];
    $valorPro = $_POST['txvalorPro'];

    $erro = 0;

    if(isset($_FILES["txImgPro"])){
        $arqNome = $_FILES["txImgPro"]["name"];
        $arqTipo = $_FILES["txImgPro"]["type"];
        $arqTamanho = $_FILES["txImgPro"]["size"];
        $arqNomeTemp = $_FILES["txImgPro"]["tmp_name"];
        $erro = $_FILES["txImgPro"]["error"];
        
        if($erro==0){
            if(is_uploaded_file($arqNomeTemp)){
                if(move_uploaded_file($arqNomeTemp,"../images/". $arqNome)){
                    //echo "Sucesso!";
                            
                    
                    $imagemProduto = '../images/' .$arqNome;
                    $produto = $_POST['txtitImgPro'];

                        try {
                            //Linha SQL	
                            $stmt = $pdo->prepare("insert into tbProduto values(null,'$imagemProduto','$titImgPro', '$titPro', '$idCategoria', '$descrPro', ' $valorPro');");  
                            $stmt->execute();				 				 
                            
                            
                            
                            echo ("<script>
                                    window.alert('Produto cadastrado com sucesso!');
                                    window.location.href='../painel-administrativo/produtos.php';								
                                </script>"
                                );							
                            
                        }catch(PDOException $e) {
                            echo 'Error: ' . $e->getMessage();
                        }
                                    
                }
                else{
                    $erro = "Falha ao mover o arquivo";
                }
            }
            else{
                $erro = "Erro no envio: arquivo não recebido.";
            }
                            
        }
        else{
            $erro = "Erro no envio: " . $erro;			
        }								
    }
    else{
        $erro = "Arquivo enviado não encontrado";
    }



//   ------------------------------------------------------------------------------------------------------------ //

    /*try{
        $stmt = $pdo ->prepare("insert into tbproduto values(null, '$imgPro', '$titImgPro', '$titPro', '$idCategoria', '$descrPro', ' $valorPro')");
        $stmt -> execute();

        $pdo  = null;

        header("location:../painel-administrativo/produtos.php");
        
    }
    catch(PDOException $e){
        echo "Erro: " . $e -> getMessage();
    }*/

?>