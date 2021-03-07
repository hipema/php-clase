<?php
/**
 * Clase Tareas
 */
require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel{
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
    private $nombre;
    private $password;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    //Métodos que estaba puestos en la clase DBA
    public function set($user_data=array()){
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        } 
        $this->query = "INSERT INTO usuarios(nombre, `password`)
                        VALUES (:nombre, :password)";
        $this->parametros['nombre'] = $fecha;
        $this->parametros['password'] = $titulo;
        $this->get_results_from_query();
        
        $this->mensaje = "Usuario insertado correctamente.";
    }

    public function get($id=''){
        if($id !=''){
            $this->query = "SELECT * FROM usuarios WHERE id=:id";
            $this->parametros["id"]=$id;
            $this->get_results_from_query();
        }
        if(count($this->rows)==1){
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Tarea encontrada.";
        }
        else{
            $this->mensaje = "Tarea no encontrada.";
        }
        return $this->rows;
    }


    public function delete($id=''){
        if($id !=''){
            $this->query = "DELETE FROM usuarios WHERE id=:id";
            $this->parametros["id"]=$id;
            $this->get_results_from_query();
            $this->mensaje = "Usuario eliminado correctamente.";
        }
        else{
            $this->mensaje = "Usuario no encontrado.";
        }
    }

    public function edit($arrayDatos = array()){
        foreach ($arrayDatos as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE `usuarios` SET `nombre`=:nombre, `password`=:password WHERE id=:id";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        $this->mensaje = "Usuario editado.";
    }

    // Método adicional para ver la última tarea (si se ha borrado la última introducida, muestra el anterior)
    public function getUltimoId() {
        $this->query = "SELECT MAX(id) from usuarios";
        $this->get_results_from_query(); 
        $id = $this->rows;
        // return $this->rows;
        return $id[0]["MAX(id)"];
    }    

    public function getAll() {
        $this->query = "SELECT * from usuarios";
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function obtenerIdPorNombre($nombreABuscar){
        $this -> query = "SELECT id from usuarios where nombre like :nombre";
        $this -> parametros['nombre'] = $nombreABuscar;
        $this->get_results_from_query();
        return $this->rows[0]['id'];
    }

}
?>