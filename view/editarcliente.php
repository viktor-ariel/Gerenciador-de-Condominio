<?php
    include('../config/conection.php');
    include('../model/cliente.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Cliente::pesquisarCliente($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Cliente($_POST);
        $user -> EditarCliente($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Cliente Editado com sucesso!');
                window.location.href = '../tables-clientes.php';
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
    <title>Upload de Arquivo</title>
</head>
<body>
    <h2>Editar Área Comum</h2>
    
        
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $user['NOME']?>"><br><br>
       
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $user['EMAIL']?>"><br><br>
        
        <input type="submit" name="enviarDados"value="Atualizar">

    </form>

    

</body>
</html>