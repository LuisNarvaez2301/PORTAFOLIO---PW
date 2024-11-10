<?php
abstract class Database {
    private static $host = "localhost";
    private static $db_name = "fcovers";
    private static $username = "root";
    private static $password = "";
    protected $conn;

    // Constructor vacío
    public function __construct() {
        $this->conn = $this->getConnection();
    }

    // Método para obtener la conexión
    protected function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                $this->conn->exec("set names utf8");
                echo "<script>console.log('Conexión exitosa');</script>";
            } catch (PDOException $exception) {
                error_log("Error de conexión: " . $exception->getMessage());
                echo "<script>console.log('Error de conexión: " . $exception->getMessage() . "');</script>";
            }
        }
        return $this->conn;
    }

    public function ejecutar_query($query, $params = []) {
        if ($this->conn === null) {
            $this->getConnection();
        }
        if (empty($params)) {
            $stmt = $this->conn->prepare($query);
        } else {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
        }
    
        return $stmt;
    }
    
    public function resultados_query($query, $params = []) {
        $stmt = $this->ejecutar_query($query, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método opcional para cerrar la conexión
    public function cerrar_conexion() {
        $this->conn = null;
    }
}
