<?php
    session_start();
    include('../config/conection.php');  
    include('../model/funcionario.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Funcionario::deletarFuncionario($pdo,$id);
        echo"
            <script>
                alert('Usuario deletado com sucesso');
                window.location.href='../tables-funcionario.php';
            </script>
        ";
    }
?>