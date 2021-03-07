<?php
/**
 * Clase Género
 */
require_once('DBAbstractModel.php');

class Genero extends DBAbstractModel{
    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    private $id;
    private $nombreModulo;

    public function setNombreModulo($nombreModulo){
        $this->nombreModulo = $nombreModulo;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    //Métodos que estaba puestos en la clase DBA
    public function set($genero=""){
        $this->query = "INSERT INTO generos(nombre)
                        VALUES (:nombre)";
        $this->parametros['nombre'] = $genero;
        $this->get_results_from_query();
        
        $this->mensaje = "Género insertado correctamente.";
    }

    public function get($id=''){
        if($id !=''){
            $this->query = "SELECT * FROM generos WHERE id=:id";
            $this->parametros["id"]=$id;
            $this->get_results_from_query();
        }
        if(count($this->rows)==1){
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Género encontrado.";
        }
        else{
            $this->mensaje = "Género no encontrado.";
        }
        return $this->rows;
    }


    public function delete($id=''){
        if($id !=''){
            $this->query = "DELETE FROM modulos WHERE id=:id";
            $this->parametros["id"]=$id;
            $this->get_results_from_query();
            $this->mensaje = "Módulo eliminado correctamente.";
        }
        else{
            $this->mensaje = "Módulo no encontrado.";
        }
    }

    public function edit($arrayDatos = array()){
        foreach ($arrayDatos as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE `modulos` SET `nombreModulo`=:nombreModulo WHERE id=:id";
        $this->parametros['nombreModulo'] = $nombreModulo;
        $this->get_results_from_query();
        $this->mensaje = "Módulo editado.";
    }

    // Método adicional para ver el último módulo (si se ha borrado el último introducido, muestra el anterior)
    public function getUltimoId() {
        $this->query = "SELECT MAX(id) from modulos";
        $this->get_results_from_query(); 
        $id = $this->rows;
        // return $this->rows;
        return $id[0]["MAX(id)"];
    }    

    public function getAll() {
        $this->query = "SELECT * from generos";
        $this->get_results_from_query();
        return $this-> rows;
    }

    // public function arrayModulos() {
    //     $this->query = "SELECT nombreModulo from modulos";
    //     $this->get_results_from_query();
    //     $resultado = [];
    //     foreach ($this->rows as $campo => $valor) {
    //         array_push($resultado, $valor['nombreModulo']);
    //     }
    //     return $resultado;
    // }

    // public function obtenerIdPorNombre($nombreABuscar){
    //     $this -> query = "SELECT id from modulos where nombreModulo like :nombreModulo";
    //     $this -> parametros['nombreModulo'] = $nombreABuscar;
    //     $this->get_results_from_query();
    //     return $this->rows[0]['id'];
    // }

    public function obtenerGeneroPorId($id){
        $this -> query = "SELECT nombre from generos where id like :id";
        $this -> parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows[0]['nombre'];
    }

}
?>