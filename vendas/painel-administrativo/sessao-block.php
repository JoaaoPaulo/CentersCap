    <?php
    
    session_start();

        if(!isset($_SESSION['autorizacao'])){
            header("location:http://localhost/CentersCap/vendas/public/login.php");

        }
    ?>