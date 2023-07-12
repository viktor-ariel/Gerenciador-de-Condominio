<?php
    class Funcionario{
        public $nome;
        public $cargo;
        public $ID_condominio;
        		

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->nome = $atrib['nome'];
                $this->cargo= $atrib['cargo'];
                $this->ID_condominio = $atrib['ID_condominio'];
            }
        }
        static function mostrarFuncionario($pdo){
            $sth = $pdo->query("SELECT * FROM funcionario");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function editarFuncionario($pdo,$id){
            $sth = $pdo->prepare("UPDATE funcionario SET nome=:nome,cargo=:cargo,ID_condominio=:ID_condominio WHERE ID_funcionario=:id");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':cargo', $this->cargo);
            $sth->BindValue(':ID_condominio', $this->ID_condominio);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
        public function cadastrarFuncionario($pdo){
            $sth = $pdo->prepare("INSERT INTO funcionario (nome,cargo,ID_condominio) value (:nome,:cargo,:ID_condominio)");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':cargo', $this->cargo);
            $sth->BindValue(':ID_condominio', $this->ID_condominio);
            return $sth->execute();
        }
        static function deletarFuncionario($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM funcionario WHERE ID_funcionario=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarFuncionario($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM funcionario WHERE  ID_funcionario=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }
    }
?>