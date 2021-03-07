<?php
/**
 * Clase Pelicula
 */
require_once('DBAbstractModel.php');

class Pelicula extends DBAbstractModel{
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
    private $titulo;
    private $anyo;
    private $edad_recomendada;
    private $director;

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function setAnyo($anyo){
        $this->anyo = $anyo;
    }
    
    public function setEdadRecomendada($edad_recomendada){
        $this->edad_recomendada = $edad_recomendada;
    }
    
    public function setDirector($director){
        $this->director = $director;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    //Métodos que estaba puestos en la clase DBA
    public function set($user_data=array()){
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        } 
        $this->query = "INSERT INTO peliculas(titulo, anyo, edad_recomendada, director)
                        VALUES (:titulo, :anyo, :edad_recomendada, :director)";
        $this->parametros['titulo'] = $titulo;
        $this->parametros['anyo'] = $anyo;
        $this->parametros['edad_recomendada'] = $edad_recomendada;
        $this->parametros['director'] = $director;
        $this->get_results_from_query();
        
        $this->mensaje = "Película insertada correctamente.";
        
        $id = $this->lastInsertId();

        foreach ($generos as $id_genero) {
            $this->query = "INSERT INTO peliculas_generos (id_pelicula, id_genero)
                        VALUES (:id_pelicula, :id_genero)";
            $this->parametros['id_pelicula'] = $id;
            $this->parametros['id_genero'] = $id_genero;
            $this->get_results_from_query();
        }

    }

    public function get($id=''){
        if($id !=''){
            $this->query = "SELECT * FROM peliculas WHERE id=:id";
            $this->parametros["id"]=$id;
            $this->get_results_from_query();
        }
        if(count($this->rows)==1){
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Película encontrada.";
        }
        else{
            $this->mensaje = "Película no encontrada.";
        }
        return $this->rows;
    }


    public function delete($id=''){
        if($id !=''){
            $this->query = "DELETE FROM peliculas WHERE id=:id";
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
        $this->query = "SELECT MAX(id) from peliculas";
        $this->get_results_from_query(); 
        $id = $this->rows;
        // return $this->rows;
        return $id[0]["MAX(id)"];
    }    

    public function getAll() {
        $this->query = "SELECT * from peliculas";
        $this->get_results_from_query();
        return $this-> rows;
    }
    /**
     * Devuelve los géneros que tiene una película en formato int.
     */
    public function buscarGeneros($id){
        $this->query = "SELECT id_genero from peliculas_generos where id_pelicula like :id_pelicula";
        $this->parametros['id_pelicula'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function buscarNumeroFavoritos($id){
        $this->query = "SELECT * from peliculas_usuarios where id_pelicula like :id_pelicula";
        $this->parametros['id_pelicula'] = $id;
        $this->get_results_from_query();
        return count($this->rows);
    }

    public function annadirAFavorito($id_pelicula, $id_usuario){
        $this->query = "INSERT INTO peliculas_usuarios (id_pelicula, id_usuario)
                    VALUES (:id_pelicula, :id_usuario)";
        $this->parametros['id_pelicula'] = $id_pelicula;
        $this->parametros['id_usuario'] = $id_usuario;
        $this->get_results_from_query();
    }
    
    public function quitarFavorito($id_pelicula, $id_usuario){
        $this->query = "DELETE from peliculas_usuarios where id_pelicula like :id_pelicula and id_usuario like :id_usuario";
        $this->parametros['id_pelicula'] = $id_pelicula;
        $this->parametros['id_usuario'] = $id_usuario;
        $this->get_results_from_query();
    }

    public function comprobarSiFavorito($id_pelicula, $id_usuario){
        $this->query = "SELECT * from peliculas_usuarios where id_pelicula like :id_pelicula and id_usuario like :id_usuario";
        $this->parametros['id_pelicula'] = $id_pelicula;
        $this->parametros['id_usuario'] = $id_usuario;
        $this->get_results_from_query();
        if ($this-> rows != null) return true;
        return false;
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

    // public function obtenerModuloPorId($id){
    //     $this -> query = "SELECT nombreModulo from modulos where id like :id";
    //     $this -> parametros['id'] = $id;
    //     $this->get_results_from_query();
    //     return $this->rows[0]['nombreModulo'];
    // }

}
?>