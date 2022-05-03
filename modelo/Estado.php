<?php
include_once 'Conexion.php';
class Estado{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso=$db->pdo;
    }
    function llenar_estado(){
        $sql="SELECT * FROM estado_pago";
        $query= $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos; 
    }
    
}