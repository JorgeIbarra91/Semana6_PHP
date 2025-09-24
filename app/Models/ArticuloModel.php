<?php
namespace App\Models;
use CodeIgniter\Model;

class ArticuloModel extends Model
{
    // Se efine la tabla que este modelo
    protected $table = 'articulos';
    // Se define la clave primaria de la tabla
    protected $primaryKey = 'id';
    // Campos que se pueden insertar o actualizar
    protected $allowedFields = ['titulo', 'contenido', 'fecha', 'imagen'];
}
?>