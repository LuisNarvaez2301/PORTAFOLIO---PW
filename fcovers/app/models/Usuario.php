<?php
require_once 'config/database.php';

class Usuario extends Database {
    private $table_name = "usuarios";

    public $id;
    public $nombre;
    public $email;
    public $contraseña;
    public $fecha_registro;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function crear($data) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, email, contraseña) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$data['nombre'], $data['email'], password_hash($data['contraseña'], PASSWORD_BCRYPT)]);
        return $stmt;
    }

    public function leer($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $data) {
        // Comienza construyendo la consulta
        $query = "UPDATE usuarios SET nombre = :nombre, email = :email";
    
        // Si se proporciona una nueva contraseña, agrégala a la consulta
        if (isset($data['contraseña']) && !empty($data['contraseña'])) {
            $query .= ", contraseña = :contraseña";
        }
    
        // Agregar cláusula WHERE para el ID del usuario
        $query .= " WHERE id = :id";
    
        // Preparamos los parámetros para la consulta
        $params = [
            ':nombre' => $data['nombre'],
            ':email' => $data['email'],
            ':id' => $id
        ];
    
        // Si la contraseña no está vacía, agregamos el parámetro de contraseña
        if (isset($data['contraseña']) && !empty($data['contraseña'])) {
            $params[':contraseña'] = password_hash($data['contraseña'], PASSWORD_BCRYPT);
        }
    
        // Ejecutar la consulta
        $stmt = $this->ejecutar_query($query, $params);
        return $stmt;
    }
    

    public function borrar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function iniciarSesion($email, $contraseña) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            return $usuario;
        } else {
            return false;
        }
    }
}
?>
