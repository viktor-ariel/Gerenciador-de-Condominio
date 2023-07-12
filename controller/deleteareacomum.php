<?php
    session_start();
    include('../config/conection.php');  
    include('../model/areacomum.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        AreaComum::deletarAreaComum($pdo,$id);
        echo"
            <script>
                alert('Usuario deletado com sucesso');
                window.location.href='../tables-areacomum.php';
            </script>
        ";
    }
?>
