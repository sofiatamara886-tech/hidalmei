<?php
require_once __DIR__ . '/../config/database.php';

class Product {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getFiltered($paisId = null, $categoriaId = null) {
        $sql = "SELECT p.*, c.nombre as categoria_nombre, pa.nombre as pais_nombre 
                FROM productos p 
                LEFT JOIN categorias c ON p.categoria_id = c.id 
                LEFT JOIN paises pa ON p.pais_id = pa.id 
                WHERE 1=1";

        $params = [];
        if ($paisId) {
            $sql .= " AND p.pais_id = :pais_id";
            $params[':pais_id'] = $paisId;
        }

        if ($categoriaId) {
            $sql .= " AND p.categoria_id = :categoria_id";
            $params[':categoria_id'] = $categoriaId;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // LEER POR ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // CREAR
    public function create($nombre, $descripcion, $precio, $categoria_id, $pais_id, $imagen = '') {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nombre))) . '-' . uniqid();
        
        $sql = "INSERT INTO productos (nombre, slug, descripcion, precio, categoria_id, pais_id, imagen) 
                VALUES (:nombre, :slug, :descripcion, :precio, :categoria_id, :pais_id, :imagen)";
                
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':slug' => $slug,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria_id' => $categoria_id,
            ':pais_id' => $pais_id,
            ':imagen' => $imagen
        ]);
    }

    public function createWithImage($nombre, $descripcion, $precio, $categoria_id, $pais_id, $imagen) {
        return $this->create($nombre, $descripcion, $precio, $categoria_id, $pais_id, $imagen);
    }

    // ACTUALIZAR NORMAL
    public function update($id, $nombre, $descripcion, $precio, $categoria_id, $pais_id) {
        $sql = "UPDATE productos 
                SET nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria_id = :categoria_id, pais_id = :pais_id 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria_id' => $categoria_id,
            ':pais_id' => $pais_id
        ]);
    }

    // ACTUALIZAR CON IMAGEN
    public function updateWithImage($id, $nombre, $descripcion, $precio, $categoria_id, $pais_id, $imagen) {
        $sql = "UPDATE productos 
                SET nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria_id = :categoria_id, pais_id = :pais_id, imagen = :imagen 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria_id' => $categoria_id,
            ':pais_id' => $pais_id,
            ':imagen' => $imagen
        ]);
    }

    // ELIMINAR
    public function delete($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function getPaises() {
        $stmt = $this->conn->prepare("SELECT * FROM paises");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategorias() {
        $stmt = $this->conn->prepare("SELECT * FROM categorias");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM productos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}