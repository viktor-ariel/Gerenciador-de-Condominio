<?php
    session_start();
    include('../config/conection.php');  
    include('../model/cliente.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Cliente::deletarCliente($pdo,$id);
        echo"
            <script>
                alert('Cliente deletado com sucesso');
                window.location.href='../tables-clientes.php';
            </script>
        ";
    }
?>