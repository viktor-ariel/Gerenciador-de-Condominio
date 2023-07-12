<?php
    include('../config/conection.php');
    include('../model/funcionario.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Funcionario::pesquisarFuncionario($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Funcionario($_POST);
        $user -> editarFuncionario($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Funcionário Editado com sucesso!');
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
    <title>Funcionario</title>
</head>
<body>
    <h2>Editar Funcionario</h2>
    
        
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $user['nome']?>"><br><br>
       
        <label for="email">Cargo:</label>
        <input type="text" id="cargo" name="cargo" value="<?php echo $user['cargo']?>"><br><br>

        <label for="email">ID Condominio:</label>
        <input type="text" id="ID_condominio" name="ID_condominio" value="<?php echo $user['ID_condominio']?>"><br><br>
   
        <input type="submit" name="enviarDados"value="Atualizar">


    </form>

    

</body>
</html>