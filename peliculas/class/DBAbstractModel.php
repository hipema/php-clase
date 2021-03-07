<?php
    abstract class DBAbstractModel
    {
        private static $db_host = DBHOST;
        private static $db_user = DBUSER;
        private static $db_pass = DBPASS;
        private static $db_name = DBNAME;
        private static $db_port = DBPORT;

        protected $mensaje = "";
       // protected $conn; //Manejador de la BD (esto jose lo tiene descomentado)

        protected $query; //consulta
        protected $parametros = array(); //parámetros de entrada
        protected $rows = array(); //array con los datos de salida

        //Métodos abstractos para implementar en los diferentes módulos 
        abstract protected function get(); //select
        abstract protected function set();
        abstract protected function edit();
        abstract protected function delete();

        //Crear conexión a la base de datos.
        protected function open_connection()
        {
            $dsn = "mysql:host=" . self::$db_host . ";"
                . "dbname=" . self::$db_name . ";"
                . "port=" . self::$db_port;
            try {
                $this->conn = new PDO($dsn, self::$db_user, self::$db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                return $this->conn;
            } catch (PDOException $e) {
                printf("Conexion fallida: %s\n", $e->getMessage());
                exit();
            }
        }

        //Método que devuelve el último id introducido
        public function lastInsertId()
        {
            return $this->conn->lastInsertId();
        }

        //Desconectar la base de datos
        public function close_connection()
        {
            return $this->conn = null;
        }

        //Traer resultados de una consultas en un Array.
        //Consulta que devuelve tuplas de la tabla.
        protected function get_results_from_query()
        {
            $this->open_connection();
            //$_result = false;
            if (($_stmt = $this->conn->prepare($this->query))) {
                if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
                    $_named = array_pop($_named);
                    foreach ($_named as $_param) {
                        $_stmt->bindValue($_param, $this->parametros[substr($_param, 1)]);
                    }
                }

                try {
                    if (!$_stmt->execute()) {
                        printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
                    }
                    //$_result = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                    $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                    $_stmt->closeCursor();
                } catch (PDOException $e) {
                    printf("Error en consulta: %s\n", $e->getMessage());
                }
            }

            //return $_result;
        }
}