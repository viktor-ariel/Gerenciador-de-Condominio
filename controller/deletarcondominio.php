<?php
    session_start();
    include('../config/conection.php');  
    include('../model/condominio.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Condominio::deletarCondominio($pdo,$id);
        echo"
            <script>
                alert('Condominio deletado com sucesso');
                window.location.href='../tables-condominio.php';
            </script>
        ";
    }
?>