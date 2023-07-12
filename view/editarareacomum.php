<?php
    include('../config/conection.php');
    include('../model/areacomum.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = AreaComum::pesquisarAreaComum($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new AreaComum($_POST);
        $user -> EditarAreaComum($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Área comum Editado com sucesso!');
                window.location.href = '../tables-areacomum.php';
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
        <label for="nome">ID do comdominio:</label>
        <input type="text" name="id_condominio" id="id_condominio" value="<?php echo $user['ID_Condominio']?>"><br><br>
       

        <label for="email">Nome da Área:</label>
        <input type="text" id="nome_area" name="nome_area" value="<?php echo $user['Nome_Area']?>"><br><br>
        

        <label for="linguagem">Capacidade:</label>
        <input type="text" id="capacidade" name="capacidade" value="<?php echo $user['Capacidade']?>"><br><br>

        <label for="">Taxa de Utilização:</label>
        <input type="text" id="taxa_utilizacao" name="taxa_utilizacao" value="<?php echo $user['Taxa_Utilizacao']?>"><br><br>
        
        <input type="submit" name="enviarDados"value="Atualizar">

    </form>

    

</body>
</html>