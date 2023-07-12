<?php
    session_start();
    include('../config/conection.php');  
    include('../model/unidade.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Unidade::deletarUnidade($pdo,$id);
        echo"
            <script>
                alert('Unidade deletado com sucesso');
                window.location.href='../tables-unidade.php';
            </script>
        ";
    }
?>