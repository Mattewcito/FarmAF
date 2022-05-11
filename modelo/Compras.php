<?php
include_once 'Conexion.php';
class Compras{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso=$db->pdo;
    }
    function crear($codigo,$fecha_compra,$fecha_entrega,$total,$id_estado,$id_proveedor){
        $sql="INSERT INTO compra(codigo,fecha_compra,fecha_entrega,total,id_estado_pago,id_proveedor) values (:codigo,:fecha_compra,:fecha_entrega,:total,:id_estado_pago,:id_proveedor);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':codigo'=>$codigo,':fecha_compra'=>$fecha_compra,':fecha_entrega'=>$fecha_entrega,':total'=>$total,':id_estado_pago'=>$id_estado,':id_proveedor'=>$id_proveedor));
        echo 'add';
    }
    function ultima_compra(){
        $sql="SELECT MAX(id) as ultima_compra FROM compra";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function listar_compras(){
        $sql="SELECT concat(c.id, ' | ', c.codigo) as codigo, fecha_compra,fecha_entrega,total,e.nombre as estado, p.nombre as proveedor FROM compra as c
        join estado_pago as e on e.id = id_estado_pago
        join proveedor as p on p.id_proveedor = c.id_proveedor";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function editarEstado($id_compra,$id_estado){
        $sql="UPDATE compra SET id_estado_pago=:id_estado where id=:id_compra";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id_estado'=>$id_estado,':id_compra'=>$id_compra));
    }
    function obtenerDatos($id){
        $sql="SELECT concat(c.id, ' | ', c.codigo) as codigo, fecha_compra,fecha_entrega,total,e.nombre as estado, p.nombre as proveedor,
        telefono,correo,direccion,p.avatar as avatar
        FROM compra as c
        join estado_pago as e on e.id = id_estado_pago and c.id=:id
        join proveedor as p on p.id_proveedor = c.id_proveedor";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}