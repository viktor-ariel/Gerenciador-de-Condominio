<?php
    class AreaComum{
        public $id_condominio;
        public $nome_area;
        public $capacidade;
        public $taxa_utilizacao;

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->id_condominio = $atrib['id_condominio'];
                $this->nome_area= $atrib['nome_area'];
                $this->capacidade = $atrib['capacidade'];
                $this->taxa_utilizacao = $atrib['taxa_utilizacao'];
            }
        }
        public function cadastrarAreaComum($pdo){
            $sth = $pdo->prepare("INSERT INTO area_comume (id_condominio,nome_area,capacidade,taxa_utilizacao) value (:id_condominio,:nome_area,:capacidade,:taxa_utilizacao)");
            $sth->BindValue(':id_condominio', $this->id_condominio);
            $sth->BindValue(':nome_area', $this->nome_area);
            $sth->BindValue(':capacidade', $this->capacidade);
            $sth->BindValue(':taxa_utilizacao',$this->taxa_utilizacao);
            return $sth->execute();
        } 
        public function editarAreaComum($pdo,$id){
            $sth = $pdo->prepare("UPDATE area_comume SET ID_Condominio=:id_condominio,Nome_Area=:nome_area,Capacidade=:capacidade,Taxa_Utilizacao=:taxa_utilizacao WHERE ID_Area_Comum=:id");
            $sth->BindValue(':id_condominio', $this->id_condominio);
            $sth->BindValue(':nome_area', $this->nome_area);
            $sth->BindValue(':capacidade', $this->capacidade);
            $sth->BindValue(':taxa_utilizacao', $this->taxa_utilizacao);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
      
        static function mostrarAreaComum($pdo){
            $sth = $pdo->query("SELECT * FROM area_comume");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }


        static function deletarAreaComum($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM area_comume WHERE ID_Area_Comum=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }

        static function pesquisarAreaComum($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM area_comume WHERE ID_Area_Comum=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }

    }
?>
