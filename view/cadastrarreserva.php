<?php
    include('../config/conection.php');
    include('../model/reserva.php');

    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Reserva($_POST);
        $user -> cadastrarReserva($pdo);
        if ($user){
            echo "<script> 
                alert('Reserva cadastrado com sucesso!');
                window.location.href = '../tables-reserva.php';
            </script>
            ";
        }

      }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        table,tr,td, tbody, thead{
            border: 1px solid #666;
            border-collapse: collapse;
            padding: 4px;
        }
        thead{
            background: #eee;
        }
        .cor{
            color: blueviolet;
            padding-left: 10px;
        }
    </style>
    <title>Cadastrar Reserva</title>
</head>
<body>
    <h2>Cadastrar Reserva</h2>
    
        
    <form action="" method="POST">
        <label for="nome">ID da unidade:</label>
        <input type="text" id="ID_unidade" name="ID_unidade" required><br><br>

        <label for="nome">ID em Area Comum:</label>
        <input type="text" id="ID_Area_Comum" name="ID_Area_Comum" required><br><br>

        <label for="nome">Data de Reserva:</label>
        <input type="text" id="Data_Reserva" name="Data_Reserva" required><br><br>

        <label for="nome">Hora Inicio:</label>
        <input type="text" id="Hora_Inicio" name="Hora_Inicio" required><br><br>

        <label for="nome">Hora Fim:</label>
        <input type="text" id="Hora_Fim" name="Hora_Fim" required><br><br>

        <input type="submit" name="enviarDados"value="Cadastrar">

    </form>

    

</body>
</html>