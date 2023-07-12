<?php
    include('../config/conection.php');
    include('../model/usuario.php');

    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Usuario($_POST);
        $user -> cadastrarUsuario($pdo);
        if ($user){
            echo "<script> 
                alert('Usuário cadastrado com sucesso!');
                window.location.href = '../tables-usuario.php';
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
    <title>Cadastrar Usuario</title>
</head>
<body>
    <h2>Cadastrar Usuario</h2>
    
        
    <form action="" method="POST">
        <label for="nome">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="nome">Senha:</label>
        <input type="text" id="senha" name="senha" required><br><br>

        <label for="nome">Id do Cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <input type="submit" name="enviarDados"value="Cadastrar">

    </form>

    

</body>
</html>