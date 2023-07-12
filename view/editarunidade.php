<?php
    include('../config/conection.php');
    include('../model/unidade.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Unidade::pesquisarUnidade($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Unidade($_POST);
        $user -> editarUnidade($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Unidade Editado com sucesso!');
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
    <title>Unidade</title>
</head>
<body>
    <h2>Editar Unidade </h2>
        
    <form action="" method="POST">
        <label for="nome">ID do Condominio:</label>
        <input type="text" name="ID_Condominio" id="ID_Condominio" value="<?php echo $user['ID_Condominio']?>"><br><br>
       
        <label for="nome">ID da Unidade:</label>
        <input type="text" name="Numero_Unidade" id="Numero_Unidade" value="<?php echo $user['Numero_Unidade']?>"><br><br>

        <label for="nome">Proprietario:</label>
        <input type="text" name="Proprietario" id="Proprietario" value="<?php echo $user['Proprietario']?>"><br><br>

        <label for="email">Telefone do Proprietario:</label>
        <input type="text" id="Telefone_Proprietario" name="Telefone_Proprietario" value="<?php echo $user['Telefone_Proprietario']?>"><br><br>

        <label for="email">Email do Proprietario:</label>
        <input type="text" id="Email_Proprietario" name="Email_Proprietario" value="<?php echo $user['Email_Proprietario']?>"><br><br>
   
        <input type="submit" name="enviarDados"value="Atualizar">
    </form>

    

</body>
</html>