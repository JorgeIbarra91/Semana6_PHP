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

    // Procesa el registro de usuario con validaciones y mensajes personalizados
    public function guardarRegistro()
    {
        $usuarioModel = new UsuarioModel();

        // Reglas de validacion para los campos del formulario
        $validationRules = [
            'nombre' => 'required|min_length[3]|max_length[50]',
            'correo' => 'required|valid_email|is_unique[usuarios.correo]',
            'password' => 'required|min_length[6]'
        ];

        // Mensajes personalizados para cada regla de validacion
        $validationMessages = [
            'nombre' => [
                'required' => 'El campo Nombre es obligatorio.',
                'min_length' => 'El campo Nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El campo Nombre no puede exceder 50 caracteres.'
            ],
            'correo' => [
                'required' => 'El campo Correo es obligatorio.',
                'valid_email' => 'Debe ingresar un correo valido.',
                'is_unique' => 'El correo ya esta registrado.'
            ],
            'password' => [
                'required' => 'El campo Contrasena es obligatorio.',
                'min_length' => 'La contrasena debe tener al menos 6 caracteres.'
            ]
        ];

        // Validar los datos recibidos con las reglas y mensajes personalizados
        if (!$this->validate($validationRules, $validationMessages)) {
            // Si la validacion falla, redirige atras con los errores y los datos ingresados
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // Obtener datos sanitizados del formulario
        $nombre = $this->request->getPost('nombre', FILTER_SANITIZE_STRING);
        $correo = $this->request->getPost('correo', FILTER_SANITIZE_EMAIL);
        // Hashear la contrasena para seguridad
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $usuarioModel->insert([
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => $password
        ]);

        // Redirigir al formulario con mensaje de exito
        return redirect()->to('/usuarios/registro')->with('mensaje', 'Usuario registrado correctamente.');
    }
}