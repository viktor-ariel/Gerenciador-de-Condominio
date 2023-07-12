<?php
    include('../config/conection.php');
    include('../model/condominio.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Condominio::pesquisarCondominio($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Condominio($_POST);
        $user -> editarCondominio($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Condomínio Editado com sucesso!');
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
    <title>Condominio</title>
</head>
<body>
    <h2>Editar Codomínio</h2>
    
        
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $user['nome']?>"><br><br>
       
        <label for="email">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo $user['endereco']?>"><br><br>

        <label for="email">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo $user['cidade']?>"><br><br>

        <label for="email">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo $user['estado']?>"><br><br>

        <label for="email">CEP:</label>
        <input type="text" id="CEP" name="CEP" value="<?php echo $user['CEP']?>"><br><br>

        <label for="email">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $user['telefone']?>"><br><br>
        
        <input type="submit" name="enviarDados"value="Atualizar">


    </form>

    

</body>
</html>