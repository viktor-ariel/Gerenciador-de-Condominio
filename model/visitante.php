<?php
    class Visitante{
        public $ID_unidade;
        public $nome;
        public $data_entrada;
        public $data_saida;


        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->ID_unidade = $atrib['ID_unidade'];
                $this->nome = $atrib['nome'];
                $this->data_entrada = $atrib['data_entrada'];
                $this->data_saida = $atrib['data_saida'];
            }
        }
        static function mostrarVisitante($pdo){
            $sth = $pdo->query("SELECT * FROM visitante");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }



        public function editarVisitante($pdo,$id){
            $sth = $pdo->prepare("UPDATE visitante SET ID_unidade=:ID_unidade,nome=:nome,data_entrada=:data_entrada,data_saida=:data_saida WHERE ID_visitante=:id");
            $sth->BindValue(':ID_unidade', $this->ID_unidade);
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':data_entrada', $this->data_entrada);
            $sth->BindValue(':data_saida', $this->data_saida);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
        public function cadastrarVisitante($pdo){
            $sth = $pdo->prepare("INSERT INTO visitante (ID_unidade,nome,data_entrada,data_saida) value (:ID_unidade,:nome,:data_entrada,:data_saida)");
            $sth->BindValue(':ID_unidade', $this->ID_unidade);
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':data_entrada', $this->data_entrada);
            $sth->BindValue(':data_saida', $this->data_saida);
            return $sth->execute();
        }
        static function deletarVisitante($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM visitante WHERE ID_visitante=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarVisitante($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM visitante WHERE  ID_visitante=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }





        
    }
?>