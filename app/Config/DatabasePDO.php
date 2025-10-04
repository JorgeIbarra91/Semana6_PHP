<?php
namespace App\Config;

use PDO;
use PDOException;

/**
 * Clase DatabasePDO
 * 
 * Clase de conexión personalizada para manejar PDO sin
 * entrar en conflicto con la clase Database propia de CodeIgniter.
 */
class DatabasePDO {
    private $host = "localhost";
    private $db_name = "elfaro";   //  Ajusta el nombre de tu BD
    private $username = "root";    //  Ajusta con tu usuario
    private $password = "";        //  Ajusta con tu pass
    private $conn;

    /**
     * Retorna la conexión PDO única.
     */
    public function connect() {
        if ($this->conn === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("❌ Error de conexión con PDO: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}