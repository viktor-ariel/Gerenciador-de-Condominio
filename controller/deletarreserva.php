<?php
    session_start();
    include('../config/conection.php');  
    include('../model/reserva.php');
        
        
    $id = $_GET['id'];


    if(!empty($id)){
        Reserva::deletarReserva($pdo,$id);
        echo"
            <script>
                alert('Reserva deletado com sucesso');
                window.location.href='../tables-reserva.php';
            </script>
        ";
    }
?>