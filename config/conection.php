<?php
    define('servidor',  'localhost');
    define('usuario',   'root');
    define('senha',     '');
    define('bd',        'padaria');

    try {
        $pdo = new PDO ('mysql:host='.servidor.';dbname='.bd,usuario,senha);
    } catch (PDOEXception $e ) {
        echo 'Erro! não foi possivel connectar o banco. Erro: ' . $e -> getMessage();
    }
?>