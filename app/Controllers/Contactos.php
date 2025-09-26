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

    // Procesa el envio del formulario con validaciones y mensajes personalizados
    public function enviar()
    {
        $contactoModel = new ContactoModel();

        // Reglas de validacion para los campos del formulario
        $validationRules = [
            'nombre' => 'required|min_length[3]|max_length[50]',
            'correo' => 'required|valid_email',
            'mensaje' => 'required|min_length[10]|max_length[500]'
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
                'valid_email' => 'Debe ingresar un correo valido.'
            ],
            'mensaje' => [
                'required' => 'El campo Mensaje es obligatorio.',
                'min_length' => 'El campo Mensaje debe tener al menos 10 caracteres.',
                'max_length' => 'El campo Mensaje no puede exceder 500 caracteres.'
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
        $mensaje = $this->request->getPost('mensaje', FILTER_SANITIZE_STRING);

        // Insertar el mensaje en la base de datos con la fecha actual
        $contactoModel->insert([
            'nombre' => $nombre,
            'correo' => $correo,
            'mensaje' => $mensaje,
            'fecha' => date("Y-m-d H:i:s")
        ]);

        // Redirigir al formulario con mensaje de exito
        return redirect()->to('/contactos')->with('mensaje', 'Mensaje enviado correctamente.');
    }
}