<?php
namespace App\Controllers;
use App\Models\ContactoModel;

class Contactos extends BaseController
{
    // Muestra el formulario de contacto
    public function index()
    {
        return view('layout/header')
            . view('contactos/formulario')
            . view('layout/footer');
    }

    // Procesa el envío del formulario
    public function enviar()
    {
        $contactoModel = new ContactoModel();

        // Obtiene datos del formulario
        $nombre = $this->request->getPost('nombre');
        $correo = $this->request->getPost('correo');
        $mensaje = $this->request->getPost('mensaje');

        // Valida datos básicos
        if (strlen($nombre) < 3 || !filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($mensaje) < 10) {
            // Redirige con error si falla validación
            return redirect()->to('/contactos')->with('error','Datos inválidos en el formulario.');
        }

        // Inserta mensaje en la base de datos con fecha actual
        $contactoModel->insert([
            'nombre' => $nombre,
            'correo' => $correo,
            'mensaje' => $mensaje,
            'fecha' => date("Y-m-d H:i:s")
        ]);

        // Redirige con mensaje de éxito
        return redirect()->to('/contactos')->with('mensaje','Mensaje enviado correctamente.');
    }
}
?>