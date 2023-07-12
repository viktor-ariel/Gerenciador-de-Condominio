<?php
    session_start();
    include('../config/conection.php');  
    include('../model/visitante.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Visitante::deletarVisitante($pdo,$id);
        echo"
            <script>
                alert('Visitante deletado com sucesso');
                window.location.href='../tables-visitante.php';
            </script>
        ";
    }
?>