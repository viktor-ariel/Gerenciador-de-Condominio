<?php
    class Condominio{
        public $nome;
        public $endereco;
        public $cidade;
        public $estado;
        public $CEP;
        public $telefone;
        					

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->nome = $atrib['nome'];
                $this->endereco= $atrib['endereco'];
                $this->cidade = $atrib['cidade'];
                $this->estado = $atrib['estado'];
                $this->CEP = $atrib['CEP'];
                $this->telefone = $atrib['telefone'];
            }
        }
        static function mostrarCondominio($pdo){
            $sth = $pdo->query("SELECT * FROM condominio");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editarCondominio($pdo,$id){
            $sth = $pdo->prepare("UPDATE condominio SET nome=:nome,endereco=:endereco,cidade=:cidade,estado=:estado,CEP=:CEP,telefone=:telefone WHERE ID_condominio=:id");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':endereco', $this->endereco);
            $sth->BindValue(':cidade', $this->cidade);
            $sth->BindValue(':estado', $this->estado);
            $sth->BindValue(':CEP', $this->CEP);
            $sth->BindValue(':telefone', $this->telefone);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
        public function cadastrarCondominio($pdo){
            $sth = $pdo->prepare("INSERT INTO condominio (nome,endereco,cidade,estado,CEP,telefone) value (:nome,:endereco,:cidade,:estado,:CEP,:telefone)");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':endereco', $this->endereco);
            $sth->BindValue(':cidade', $this->cidade);
            $sth->BindValue(':estado', $this->estado);
            $sth->BindValue(':CEP', $this->CEP);
            $sth->BindValue(':telefone', $this->telefone);
            return $sth->execute();
        }
        static function deletarCondominio($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM condominio WHERE ID_condominio=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarCondominio($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM condominio WHERE  ID_condominio=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }




    }
?>