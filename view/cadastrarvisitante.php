<?php
    include('../config/conection.php');
    include('../model/visitante.php');

    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Visitante($_POST);
        $user -> cadastrarVisitante($pdo);
        if ($user){
            echo "<script> 
                alert('Visitante cadastrado com sucesso!');
                window.location.href = '../tables-visitante.php';
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
    <title>Cadastrar Visitante</title>
</head>
<body>
    <h2>Cadastrar Visitante</h2>
    
        
    <form action="" method="POST">
        <label for="nome">ID Unidade:</label>
        <input type="text" id="ID_unidade" name="ID_unidade" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="nome">Data Entrada:</label>
        <input type="text" id="data_entrada" name="data_entrada" required><br><br>

        <label for="nome">Data de Saida:</label>
        <input type="text" id="data_saida" name="data_saida" required><br><br>

        <input type="submit" name="enviarDados"value="Cadastrar">
    </form>

    

</body>
</html>