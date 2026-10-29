<?php
require_once __DIR__ . '/../config/database.php';

class Order {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($usuario_id, $total, $metodo_pago, $direccion, $carrito) {
        try {
            $this->conn->beginTransaction();

            // Insertar la orden principal
            $sql = "INSERT INTO pedidos (usuario_id, total, metodo_pago, direccion, fecha) VALUES (:usuario_id, :total, :metodo_pago, :direccion, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':usuario_id' => $usuario_id,
                ':total' => $total,
                ':metodo_pago' => $metodo_pago,
                ':direccion' => $direccion
            ]);
            $pedido_id = $this->conn->lastInsertId();

            // Insertar los detalles de los productos comprados
            foreach ($carrito as $producto_id => $cantidad) {
                $sqlDetalle = "INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad) VALUES (:pedido_id, :producto_id, :cantidad)";
                $stmtDetalle = $this->conn->prepare($sqlDetalle);
                $stmtDetalle->execute([
                    ':pedido_id' => $pedido_id,
                    ':producto_id' => $producto_id,
                    ':cantidad' => $cantidad
                ]);
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            // Mostrar el error exacto para depuración si algo falla
            echo "Error al guardar el pedido: " . $e->getMessage();
            exit;
        }
    }

    // Obtener todas las compras para el reporte del administrador
    public function getAllOrders() {
        $sql = "SELECT p.*, u.nombre as usuario_nombre FROM pedidos p LEFT JOIN usuarios u ON p.usuario_id = u.id ORDER BY p.id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}