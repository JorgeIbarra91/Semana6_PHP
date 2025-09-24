<?php
namespace App\Models;
use CodeIgniter\Model;

class ContactoModel extends Model
{
    // Se define la tabla que este modelo
    protected $table = 'contactos';
    // Se define la clave primaria de la tabla
    protected $primaryKey = 'id';
    // Campos que se pueden insertar o actualizar
    protected $allowedFields = ['nombre', 'correo', 'mensaje', 'fecha'];
}
?>