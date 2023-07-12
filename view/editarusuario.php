<?php
    include('../config/conection.php');
    include('../model/usuario.php');

            
    $id = $_GET['id'];
    if(!empty($id)){
        $user = Usuario::pesquisarUsuario($pdo,$id);
    }


    if(!empty($_REQUEST['enviarDados'])){
        extract($_REQUEST);
        $user = new Usuario($_POST);
        $user -> editarUsuario($pdo,$id);
        if ($user){
            echo "<script> 
                alert('Usuário Editado com sucesso!');
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
    <title>Unidade</title>
</head>
<body>
    <h2>Editar Unidade </h2>
        
    <form action="" method="POST">
        <label for="nome">Usuario:</label>
        <input type="text" name="usuario" id="usuario" value="<?php echo $user['USUARIO']?>"><br><br>
       
        <label for="nome">Senha:</label>
        <input type="text" name="senha" id="senha" value="<?php echo $user['SENHA']?>"><br><br>

        <label for="nome">ID Cliente:</label>
        <input type="text" name="id_cliente" id="id_cliente" value="<?php echo $user['ID_CLIENTE']?>"><br><br>

        <label for="email">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $user['NOME']?>"><br><br>

        <input type="submit" name="enviarDados"value="Atualizar">
    </form>

    

</body>
</html>