<?php
    class Cliente{
        public $nome;
        public $email;

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->nome = $atrib['nome'];
                $this->email= $atrib['email'];
            }
        }
        
        static function mostrarCliente($pdo){
            $sth = $pdo->query("SELECT * FROM cliente");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }


        public function editarCliente($pdo,$id){
            $sth = $pdo->prepare("UPDATE cliente SET nome=:nome,email=:email WHERE ID_CLIENTE=:id");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }


        public function cadastrarCliente($pdo){
            $sth = $pdo->prepare("INSERT INTO cliente (nome,email) value (:nome,:email)");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            return $sth->execute();
        } 
        
        static function deletarCliente($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM cliente WHERE ID_CLIENTE=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarCliente($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM cliente WHERE  ID_CLIENTE=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }
    }
?>