<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    // Muestra el formulario de registro
    public function registro()
    {
        return view('layout/header')
            . view('usuarios/registro')
            . view('layout/footer');
    }

    // Procesa el registro de usuario
    public function guardarRegistro()
    {
        $usuarioModel = new UsuarioModel();

        // Obtiene datos del formulario
        $nombre = $this->request->getPost('nombre');
        $correo = $this->request->getPost('correo');
        // Hashea la contraseña para seguridad
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Inserta usuario en la base de datos
        $usuarioModel->insert([
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => $password
        ]);

        // Redirige con mensaje de éxito
        return redirect()->to('/usuarios/registro')->with('mensaje','Usuario registrado correctamente.');
    }
}
?>