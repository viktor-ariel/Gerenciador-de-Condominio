<?php
    class Reserva{
        public $ID_unidade;
        public $ID_Area_Comum;
        public $Data_Reserva;
        public $Hora_Inicio;
        public $Hora_Fim;
        					
        		

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->ID_unidade = $atrib['ID_unidade'];
                $this->ID_Area_Comum= $atrib['ID_Area_Comum'];
                $this->Data_Reserva = $atrib['Data_Reserva'];
                $this->Hora_Inicio = $atrib['Hora_Inicio'];
                $this->Hora_Fim = $atrib['Hora_Fim'];
            }
        }
        static function mostrarReserva($pdo){
            $sth = $pdo->query("SELECT * FROM reserva_area_comum");
            $sth->execute();
            return $user = $sth->fetchAll(PDO::FETCH_ASSOC);
        }


        public function editarReserva($pdo,$id){
            $sth = $pdo->prepare("UPDATE reserva_area_comum SET ID_unidade=:ID_unidade,ID_Area_Comum=:ID_Area_Comum,Data_Reserva=:Data_Reserva,Hora_Inicio=:Hora_Inicio,Hora_Fim=:Hora_Fim WHERE ID_reserva=:id");
            $sth->BindValue(':ID_unidade', $this->ID_unidade);
            $sth->BindValue(':ID_Area_Comum', $this->ID_Area_Comum);
            $sth->BindValue(':Data_Reserva', $this->Data_Reserva);
            $sth->BindValue(':Hora_Inicio', $this->Hora_Inicio);
            $sth->BindValue(':Hora_Fim', $this->Hora_Fim);
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }
        public function cadastrarReserva($pdo){
            $sth = $pdo->prepare("INSERT INTO reserva_area_comum (ID_unidade,ID_Area_Comum,Data_Reserva,Hora_Inicio,Hora_Fim) value (:ID_unidade,:ID_Area_Comum,:Data_Reserva,:Hora_Inicio,:Hora_Fim)");
            $sth->BindValue(':ID_unidade', $this->ID_unidade);
            $sth->BindValue(':ID_Area_Comum', $this->ID_Area_Comum);
            $sth->BindValue(':Data_Reserva', $this->Data_Reserva);
            $sth->BindValue(':Hora_Inicio', $this->Hora_Inicio);
            $sth->BindValue(':Hora_Fim', $this->Hora_Fim);
            return $sth->execute();
        }
        static function deletarReserva($pdo,$id){
            $sth = $pdo -> prepare("DELETE FROM reserva_area_comum WHERE ID_reserva=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            return $sth->execute(); 
        }
        static function pesquisarReserva($pdo,$id){
            $sth = $pdo -> prepare("SELECT * FROM reserva_area_comum WHERE  ID_reserva=:id LIMIT 1");
            $sth -> BindValue(':id',$id);
            $sth->execute();
            return $user = $sth->fetch(PDO::FETCH_ASSOC); 
        }

    }
?>