<?php
    include('../config/conection.php');
    include('../model/condominio.php');

    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Condominio($_POST);
        $user -> cadastrarCondominio($pdo);
        if ($user){
            echo "<script> 
                alert('Condomínio cadastrado com sucesso!');
                window.location.href = '../tables-condominio.php';
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
    <title>Cadastrar Condominio</title>
</head>
<body>
    <h2>Cadastrar Condominio</h2>
    
        
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="nome">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="cidade" name="cidade" required><br><br>

        <label for="nome">Estado:</label>
        <input type="text" id="estado" name="estado" required><br><br>

        <label for="nome">CEP:</label>
        <input type="text" id="CEP" name="CEP" required><br><br>

        <label for="email">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <input type="submit" name="enviarDados"value="Cadastrar">

    </form>

    

</body>
</html>