<?php
    include('../config/conection.php');
    include('../model/funcionario.php');

    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Funcionario($_POST);
        $user -> cadastrarFuncionario($pdo);
        if ($user){
            echo "<script> 
                alert('Funcionário cadastrado com sucesso!');
                window.location.href = '../tables-funcionario.php';
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
    <title>Cadastrar Funcionario</title>
</head>
<body>
    <h2>Cadastrar Funcionario</h2>
    
        
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="nome">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="nome">ID Condominio:</label>
        <input type="text" id="ID_condominio" name="ID_condominio" required><br><br>

        <input type="submit" name="enviarDados"value="Cadastrar">

    </form>

    

</body>
</html>