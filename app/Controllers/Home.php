<?php
namespace App\Controllers;

use App\Models\ArticuloModel;

class Home extends BaseController
{
    public function index()
    {
        $articuloModel = new ArticuloModel();

        // Obtener la última noticia (orden descendente por fecha, solo 1)
        $data['ultimaNoticia'] = $articuloModel->orderBy('fecha', 'DESC')->first();

        // Cargar las vistas y pasar los datos a la vista principal
        echo view('layout/header');
        echo view('home/index', $data);
        echo view('layout/footer');
    }
}