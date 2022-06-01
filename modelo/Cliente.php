<?php
include_once 'Conexion.php';
class Cliente{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso=$db->pdo;
    }
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM cliente where estado = 'A' and nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM cliente where estado = 'A' and nombre NOT LIKE '' ORDER BY id desc LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    function crear($nombre,$apellido,$dni,$telefono,$correo,$sexo,$avatar){
        $sql="SELECT id,estado FROM cliente WHERE nombre=:nombre and apellidos=:apellido and dni=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':dni'=>$dni));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            foreach ($this->objetos as $cli) {
                $cli_id = $cli->id;
                $cli_estado = $cli->estado;
            }
            if ($cli_estado=='A') {
                echo 'noadd';
            }
            else {
                $sql="UPDATE cliente SET estado='A' where id=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$cli_id));
                echo 'add';
            }
        }
        else{
            $sql="INSERT INTO cliente(nombre,apellidos,dni,telefono,correo,sexo,avatar) values (:nombre,:apellido,:dni,:telefono,:correo,:sexo,:avatar)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':dni'=>$dni,':telefono'=>$telefono,':correo'=>$correo,':sexo'=>$sexo,':avatar'=>$avatar));
            echo 'add';
        }
    }
    function editar($id,$telefono,$correo){
        $sql="SELECT id FROM cliente WHERE id=:id";        
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchall();
        if(empty($this->objetos)){
            echo 'noedit';
        } 
        else{
            $sql="UPDATE cliente SET telefono=:telefono, correo=:correo, adicional=:adicional WHERE id=:id";
            $query= $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id,':telefono'=>$telefono, ':correo'=>$correo));
            echo 'edit';
        }

    }
    function borrar($id){
        $sql="UPDATE cliente SET estado='I' WHERE id=:id";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        if(!empty( $query->execute(array(':id'=>$id)))){
            echo 'borrado';
        }
        else{
            echo 'noborrado';
        }
        
    }
    function llenar_clientes(){
        $sql="SELECT * FRom cliente WHERE estado='A' ORDEr BY nombre ASC";
        $query= $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
        
    }
    function buscar_datos_cliente($id_cliente){
        $sql="SELECT * FROM cliente WHERE id=:id_cliente";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id_cliente'=>$id_cliente));
        $this->objetos=$query->fetchall();
        return $this->objetos;
        
    }
}