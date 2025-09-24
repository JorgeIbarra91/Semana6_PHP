<?php
namespace App\Controllers;

class Home extends BaseController
{
    // pagina principal
    public function index()
    {
        // Carga las vistas: encabezado, contenido y pie de página
        return view('layout/header')
            . view('home/index')
            . view('layout/footer');
    }
}
?>