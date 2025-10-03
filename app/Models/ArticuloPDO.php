<?php
namespace App\Models;

use App\Config\DatabasePDO;  // 👈 usamos nuestra clase personalizada
use PDO;

/**
 * Modelo ArticuloPDO
 * Maneja los artículos con PDO + Procedimientos almacenados
 */
class ArticuloPDO {
    private $conn;

    public function __construct() {
        $database = new DatabasePDO();
        $this->conn = $database->connect();
    }

    /**
     * Obtener todos los artículos ordenados por fecha descendente
     */
    public function obtenerTodos() {
        $stmt = $this->conn->prepare("SELECT * FROM articulos ORDER BY fecha DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener artículos por categoría (usa SP)
     */
    public function obtenerPorCategoria($categoria) {
        $stmt = $this->conn->prepare("CALL sp_obtener_articulos(:categoria)");
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un artículo por su ID
     */
    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM articulos WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Insertar artículo nuevo usando SP
     */
    public function insertarArticulo($titulo, $contenido, $categoria, $imagen) {
        $stmt = $this->conn->prepare("CALL sp_insertar_articulo(:titulo, :contenido, :categoria, :imagen)");
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        return $stmt->execute();
    }
}