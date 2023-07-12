<?php
    session_start();
    include('../config/conection.php');  
    include('../model/usuario.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Usuario::deletarUsuario($pdo,$id);
        echo"
            <script>
                alert('Unidade deletado com sucesso');
                window.location.href='../tables-usuario.php';
            </script>
        ";
    }
?>