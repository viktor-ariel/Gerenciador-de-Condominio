<?php
    include('../config/conection.php');
    include('../model/visitante.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Visitante::pesquisarVisitante($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Visitante($_POST);
        $user -> editarVisitante($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Visitante Editado com sucesso!');
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
    <title>Visitante</title>
</head>
<body>
    <h2>Editar Visitante</h2>
        
    <form action="" method="POST">
        <label for="nome">ID da unidade:</label>
        <input type="text" name="ID_unidade" id="ID_unidade" value="<?php echo $user['ID_unidade']?>"><br><br>
       
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $user['nome']?>"><br><br>

        <label for="nome">Data de Entrada:</label>
        <input type="text" name="data_entrada" id="data_entrada" value="<?php echo $user['data_entrada']?>"><br><br>

        <label for="email">Data de Saida:</label>
        <input type="text" id="data_saida" name="data_saida" value="<?php echo $user['data_saida']?>"><br><br>

        <input type="submit" name="enviarDados"value="Atualizar">
    </form>

    

</body>
</html>