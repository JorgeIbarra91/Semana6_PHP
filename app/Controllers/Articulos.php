<?php
namespace App\Controllers;
use App\Models\ArticuloModel;

class Articulos extends BaseController
{
    protected $articuloModel;

    public function __construct()
    {
        $this->articuloModel = new ArticuloModel();
    }

    // Listado general de noticias para la pagina principal
    public function index()
    {
        $data['articulos'] = $this->articuloModel->orderBy('fecha', 'DESC')->findAll();
        return view('layout/header')
            . view('articulos/lista', $data)
            . view('layout/footer');
    }

    // Listado de noticias por categoria (deportes, negocios, etc)
    public function categoria($categoria = null)
    {
        if ($categoria === null) {
            return redirect()->to('/articulos');
        }
        $data['articulos'] = $this->articuloModel->where('categoria', $categoria)->orderBy('fecha', 'DESC')->findAll();
        $data['categoria'] = ucfirst($categoria);
        return view('layout/header')
            . view('articulos/categoria', $data)
            . view('layout/footer');
    }

    // Formulario para agregar noticia 
    public function crear()
    {
        return view('layout/header')
            . view('articulos/crear')
            . view('layout/footer');
    }

    // Guardar noticia
    public function guardar()
    {
        $validationRules = [
            'titulo' => 'required|min_length[3]|max_length[255]',
            'contenido' => 'required|min_length[10]',
            'categoria' => 'required',
            'imagen' => 'permit_empty|is_image[imagen]|max_size[imagen,2048]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $imagenNombre = null;
        $imagenFile = $this->request->getFile('imagen');
        if ($imagenFile && $imagenFile->isValid() && !$imagenFile->hasMoved()) {
            $imagenNombre = $imagenFile->getRandomName();
            $imagenFile->move(WRITEPATH . 'uploads', $imagenNombre);
        }

        $this->articuloModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'contenido' => $this->request->getPost('contenido'),
            'categoria' => $this->request->getPost('categoria'),
            'imagen' => $imagenNombre,
            'fecha' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/articulos')->with('mensaje', 'Articulo creado correctamente.');
    }
}