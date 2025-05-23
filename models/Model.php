<?php

namespace models;

use PDO;
use PDOException;

abstract class Model {
    protected $db;
    protected $table;
    protected $fillable = [];
    public $values = [];

    public function __construct() {
        $this->db = $this->connect();
    }

    // Conexión a la base de datos
    protected function connect() {
        try {
            $host = DB_HOST;
            $dbname = DB_NAME;
            $user = DB_USER;
            $pass = DB_PASS;

            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    // Insertar un nuevo registro
    public function create() {
        $columns = implode(',', $this->fillable);
        $placeholders = rtrim(str_repeat('?,', count($this->fillable)), ',');
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($this->values);
    }

    // Búsqueda con condiciones WHERE
    public function where($conditions = []) {
        $sql = "SELECT * FROM {$this->table} WHERE ";
        $params = [];
        $wheres = [];

        foreach ($conditions as $condition) {
            list($column, $value) = $condition;
            $wheres[] = "$column = ?";
            $params[] = $value;
        }

        $sql .= implode(' AND ', $wheres);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    // Para obtener todos los registros (opcional)
    public function all() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
