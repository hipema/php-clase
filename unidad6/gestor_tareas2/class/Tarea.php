<?php
/**
 * Clase Tareas
 */
require_once('DBAbstractModel.php');

class Tarea extends DBAbstractModel{
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
    private $fecha;
    private $titulo;
    private $descripcion;
    private $modulo;
    private $estado;
    private $usuario;

    public function setFecha($fecha){
        $this->_fecha = $fecha;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function setModulo($modulo){
        $this->modulo = $modulo;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function setUsuario ($usuario){
        $this->usuario = $usuario;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function getFecha(){
        return $this->_fecha;
    }

    public static function formatearFecha($fecha) {
        return date_format(new DateTime($fecha), 'd-m-Y');
    }
    
    public function getFechaFormulario() {
        return substr($this->getFecha(), 0, 10);
    }

    public function getId() {
        return $this->_id;
    }

    //Métodos que estaba puestos en la clase DBA
    public function set($user_data=array()){
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        } 
        $this->query = "INSERT INTO tareas(fecha, titulo, descripcion, idModulo, idEstado, idUsuario)
                        VALUES (:fecha, :titulo, :descripcion, :idModulo, :idEstado, :idUsuario)";
        $this->parametros['fecha'] = $fecha;
        $this->parametros['titulo'] = $titulo;
        $this->parametros['descripcion'] = $descripcion;
        $this->parametros['idModulo'] = $idModulo;
        $this->parametros['idEstado'] = $idEstado;
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        
        $this->mensaje = "Tarea insertada correctamente.";
    }

    public function get($id=''){
        if($id !=''){
            $this->query = "SELECT * FROM tareas WHERE id=:id";
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
            $this->query = "DELETE FROM tareas WHERE id=:id";
            $this->parametros["id"]=$id;
            $this->get_results_from_query();
            $this->mensaje = "Tarea eliminada correctamente.";
        }
        else{
            $this->mensaje = "Tarea no encontrada.";
        }
    }

    public function edit($arrayDatos = array()){
        foreach ($arrayDatos as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE `tareas` SET `fecha`=:fecha, `titulo`=:titulo, `descripcion`=:descripcion, `idModulo`=:idModulo, `idEstado`=:idEstado WHERE id=:id";
        $this->parametros['fecha'] = $fecha;
        $this->parametros['titulo'] = $titulo;
        $this->parametros['descripcion'] = $descripcion;
        $this->parametros['idModulo'] = $idModulo;
        $this->parametros['idEstado'] = $idEstado;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "La tarea ha sido editada.";
    }

    // Método adicional para ver la última tarea (si se ha borrado la última introducida, muestra el anterior)
    public function getUltimoId() {
        $this->query = "SELECT MAX(id) from tareas";
        $this->get_results_from_query(); 
        $id = $this->rows;
        // return $this->rows;
        return $id[0]["MAX(id)"];
    }    

    public function getAll() {
        $this->query = "SELECT * from tareas";
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function getAllPendientes() {
        $this->query = "SELECT * from tareas where idEstado not like 8";
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function getTareasUsuario($idUsuario){
        $this->query = "SELECT * from tareas where idUsuario=:idUsuario";
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function getTareasOrdenadasFechaDesc(){
        $this->query = "SELECT * from tareas order by fecha desc";
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function getTareasOrdenadasFechaAsc(){
        $this->query = "SELECT * from tareas order by fecha";
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function getTareasOrdenadasFechaAscUsuario($idUsuario){
        $this->query = "SELECT * from tareas where idUsuario = :idUsuario order by fecha";
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function getTareasOrdenadasFechaDescUsuario($idUsuario){
        $this->query = "SELECT * from tareas where idUsuario = :idUsuario order by fecha desc";
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        return $this-> rows;
    }

    public function contarTareas($id){
        $this->query = "SELECT count(*) from tareas where idModulo = :idModulo and idEstado != 8";
        $this->parametros['idModulo'] = $id;
        $this->get_results_from_query();
        return $this->rows[0]['count(*)'];
    }

    public function getTareasModuloPendientes($idModulo){
        $this->query = "SELECT * from tareas where idModulo like :idModulo and idEstado not like 8";
        $this->parametros['idModulo'] = $idModulo;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getTareasModuloCompletadas($idModulo){
        $this->query = "SELECT * from tareas where idModulo like :idModulo and idEstado like 8";
        $this->parametros['idModulo'] = $idModulo;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function estadoCompletado($idTarea){
        $this->query = "UPDATE `tareas` SET `idEstado`=:idEstado WHERE id=:id";
        $this->parametros['id'] = $idTarea;
        $this->parametros['idEstado'] = 8;
        $this->get_results_from_query();
        $this->mensaje = "La tarea ha sido actualizada.";
    }

    // public function mostrarFecha($id){
    //     if($id !=''){
    //         $this->query = "SELECT fecha FROM tareas WHERE id=:id";
    //         $this->parametros["id"]=$id;
    //         $this->get_results_from_query();
    //     }
    //     if(count($this->rows)==1){
    //         foreach ($this->rows[0] as $propiedad => $valor) {
    //             $this->$propiedad = $valor;
    //         }
    //         $this->mensaje = "Tarea encontrada.";
    //     }
    //     else{
    //         $this->mensaje = "Tarea no encontrada.";
    //     }
    //     return $this->rows[0]['fecha'];
    // }

    
    // public function mostrarFecha($id){
    //     $fechaAMostrar = $this->get($id);
    //     return $fechaAMostrar[0]['fecha'];
    // }

}
?>