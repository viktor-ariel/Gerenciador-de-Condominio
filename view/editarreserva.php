<?php
    include('../config/conection.php');
    include('../model/reserva.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Reserva::pesquisarReserva($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Reserva($_POST);
        $user -> editarReserva($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Reserva Editado com sucesso!');
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
    <title>Funcionario</title>
</head>
<body>
    <h2>Editar Funcionario</h2>
        
    <form action="" method="POST">
        <label for="nome">ID Unidade:</label>
        <input type="text" name="ID_unidade" id="ID_unidade" value="<?php echo $user['ID_unidade']?>"><br><br>
       
        <label for="nome">ID da Area Comum:</label>
        <input type="text" name="ID_Area_Comum" id="ID_Area_Comum" value="<?php echo $user['ID_Area_Comum']?>"><br><br>

        <label for="nome">Data da Reserva:</label>
        <input type="text" name="Data_Reserva" id="Data_Reserva" value="<?php echo $user['Data_Reserva']?>"><br><br>

        <label for="email">Hora Inicio:</label>
        <input type="text" id="Hora_Inicio" name="Hora_Inicio" value="<?php echo $user['Hora_Inicio']?>"><br><br>

        <label for="email">Hora Fim:</label>
        <input type="text" id="Hora_Fim" name="Hora_Fim" value="<?php echo $user['Hora_Fim']?>"><br><br>
   
        <input type="submit" name="enviarDados"value="Atualizar">
    </form>

    

</body>
</html>