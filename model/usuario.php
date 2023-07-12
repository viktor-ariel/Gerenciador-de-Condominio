<?php
    class Usuario{
        public $usuario;
        public $senha;
        public $id_cliente;
        public $nome;

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->usuario = $atrib['usuario'];
                $this->senha = $atrib['senha'];
                $this->id_cliente = $atrib['id_cliente'];
                $this->nome = $atrib['nome'];
            }
        }
        static function mostrarUsuario($pdo){
            $sth = $pdo->query("SELECT * FROM usuario");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        public function verificaUsuario($pdo,$email,$senha){
            $sth = $pdo->prepare("SELECT * FROM usuario WHERE USUARIO=:email AND SENHA=:senha LIMIT 1");
            $sth -> BindValue(':email',$email);
            $sth -> BindValue(':senha',md5($senha));
            $sth -> execute();
            $login = $sth->fetch(PDO::FETCH_ASSOC);

            if($login){
                $_SESSION['USUARIO'] = $login['USUARIO'] ;
                return true;
            }else {
                return false;
            }
        }


        public function editarUsuario($pdo,$id){
            $sth = $pdo->prepare("UPDATE usuario SET usuario=:usuario,senha=:senha,id_cliente=:id_cliente,nome=:nome WHERE ID_USUARIO=:id");
            $sth->BindValue(':usuario', $this->usuario);
            $sth->BindValue(':senha',md5($this->senha));
            $sth->BindValue(':id_cliente', $this->id_cliente);
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
        public function cadastrarUsuario($pdo){
            $sth = $pdo->prepare("INSERT INTO usuario (usuario,senha,id_cliente,nome) value (:usuario,:senha,:id_cliente,:nome)");
            $sth->BindValue(':usuario', $this->usuario);
            $sth->BindValue(':senha', md5($this->senha));
            $sth->BindValue(':id_cliente', $this->id_cliente);
            $sth->BindValue(':nome', $this->nome);
            return $sth->execute();
        }
        static function deletarUsuario($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM usuario WHERE ID_USUARIO=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarUsuario($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM usuario WHERE ID_USUARIO=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }
        

        public function ativar_sessao(){
            return $_SESSION['login'] = true;
        }
        public function fazer_logof(){
            $_SESSION['login'] = false;
            session_destroy();
        }

    }
?>