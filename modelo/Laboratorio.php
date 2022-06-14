<?php
include 'Conexion.php';
class Laboratorio{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso=$db->pdo;
    }
    function crear($nombre,$avatar){
        $sql="SELECT id_laboratorio,estado FROM laboratorio WHERE nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            foreach ($this->objetos as $lab) {
                    $lab_id = $lab->id_laboratorio;
                    $lab_estado = $lab->estado;
                }
                if ($lab_estado=='A') {
                    echo 'noadd';
                }
                else {
                    $sql="UPDATE laboratorio SET estado='A' where id_laboratorio=:id";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id'=>$lab_id));
                    echo 'add';
                }
        }
        else{
            $sql="INSERT INTO laboratorio(nombre,avatar) values (:nombre,:avatar)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':avatar'=>$avatar));
            echo 'add';
        }
    }
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM laboratorio where estado='A' and nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM laboratorio where estado='A' and nombre NOT LIKE '' ORDER BY id_LABORATORIO LIMIT 50";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    function cambiar_logo($id,$nombre){
        $sql="SELECT avatar FROM laboratorio WHERE id_laboratorio=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchall();
            $sql="UPDATE laboratorio SET avatar=:nombre WHERE id_laboratorio=:id"; 
            $query=$this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id,':nombre'=>$nombre));
        return $this->objetos;
    }
    function borrar($id){
        $sql="SELECT * FROM producto WHERE prod_lab=:id";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $prod=$query->fetchall();
        if (!empty($prod)) {
            echo 'noborrado';
        }
        else {
            $sql="UPDATE laboratorio SET estado='I' WHERE id_laboratorio=:id";
            $query= $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id));
            if(!empty( $query->execute(array(':id'=>$id)))){
                echo 'borrado';
            }
            else{
                echo 'noborrado';
            }
        }
    }
    function editar($nombre,$id_editado){
        $sql="UPDATE laboratorio SET nombre=:nombre WHERE id_laboratorio=:id";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
        echo 'edit';
    }
    function rellenar_laboratorios(){
        $sql="SELECT * FROM laboratorio where estado='A' order by nombre asc";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}
?>