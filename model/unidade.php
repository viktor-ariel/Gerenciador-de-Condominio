<?php
    class Unidade{
        public $ID_Condominio;
        public $Numero_Unidade;
        public $Proprietario;
        public $Telefone_Proprietario;
        public $Email_Proprietario;

        				
        		

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->ID_Condominio = $atrib['ID_Condominio'];
                $this->Numero_Unidade = $atrib['Numero_Unidade'];
                $this->Proprietario = $atrib['Proprietario'];
                $this->Telefone_Proprietario = $atrib['Telefone_Proprietario'];
                $this->Email_Proprietario = $atrib['Email_Proprietario'];
            }
        }
        static function mostrarUnidade($pdo){
            $sth = $pdo->query("SELECT * FROM unidade");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }



        public function editarUnidade($pdo,$id){
            $sth = $pdo->prepare("UPDATE unidade SET ID_Condominio=:ID_Condominio,Numero_Unidade=:Numero_Unidade,Proprietario=:Proprietario,Telefone_Proprietario=:Telefone_Proprietario,Email_Proprietario=:Email_Proprietario WHERE ID_unidade=:id");
            $sth->BindValue(':ID_Condominio', $this->ID_Condominio);
            $sth->BindValue(':Numero_Unidade', $this->Numero_Unidade);
            $sth->BindValue(':Proprietario', $this->Proprietario);
            $sth->BindValue(':Telefone_Proprietario', $this->Telefone_Proprietario);
            $sth->BindValue(':Email_Proprietario', $this->Email_Proprietario);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
        public function cadastrarUnidade($pdo){
            $sth = $pdo->prepare("INSERT INTO unidade (ID_Condominio,Numero_Unidade,Proprietario,Telefone_Proprietario,Email_Proprietario) value (:ID_Condominio,:Numero_Unidade,:Proprietario,:Telefone_Proprietario,:Email_Proprietario)");
            $sth->BindValue(':ID_Condominio', $this->ID_Condominio);
            $sth->BindValue(':Numero_Unidade', $this->Numero_Unidade);
            $sth->BindValue(':Proprietario', $this->Proprietario);
            $sth->BindValue(':Telefone_Proprietario', $this->Telefone_Proprietario);
            $sth->BindValue(':Email_Proprietario', $this->Email_Proprietario);
            return $sth->execute();
        }
        static function deletarUnidade($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM unidade WHERE ID_unidade=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarUnidade($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM unidade WHERE  ID_unidade=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }



    }
?>