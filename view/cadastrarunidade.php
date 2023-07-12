<?php
    include('../config/conection.php');
    include('../model/unidade.php');

    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Unidade($_POST);
        $user -> cadastrarUnidade($pdo);
        if ($user){
            echo "<script> 
                alert('Unidade cadastrado com sucesso!');
                window.location.href = '../tables-unidade.php';
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
        <label for="nome">ID_Condominio:</label>
        <input type="text" id="ID_Condominio" name="ID_Condominio" required><br><br>

        <label for="nome">Numero da Unidade:</label>
        <input type="text" id="Numero_Unidade" name="Numero_Unidade" required><br><br>

        <label for="nome">Proprietario:</label>
        <input type="text" id="Proprietario" name="Proprietario" required><br><br>

        <label for="nome">Telefone do Proprietario:</label>
        <input type="text" id="Telefone_Proprietario" name="Telefone_Proprietario" required><br><br>

        <label for="nome">Email do Proprietario:</label>
        <input type="text" id="Email_Proprietario" name="Email_Proprietario" required><br><br>

        <input type="submit" name="enviarDados"value="Cadastrar">

    </form>

    

</body>
</html>