<?php
namespace App\Controllers;

use App\Models\ArticuloPDO;

/**
 * Controlador Articulos
 * Implementa la lógica de artículos usando PDO + Procedimientos Almacenados.
 */
class Articulos extends BaseController
{
    protected $articuloPDO;

    public function __construct()
    {
        // Usamos el modelo con PDO
        $this->articuloPDO = new ArticuloPDO();
    }

    /**
     * Listado general de noticias para la página principal
     */
    public function index()
    {
        // Obtenemos todos los artículos (puedes crear un SP para esto también)
        $data['articulos'] = $this->articuloPDO->obtenerTodos();

        echo view('layout/header');
        echo view('articulos/lista', $data);
        echo view('layout/footer');
    }

    /**
     * Listado de noticias por categoría (deportes, negocios, etc)
     */
    public function categoria($categoria = null)
    {
        if ($categoria === null) {
            return redirect()->to('/articulos');
        }

        // Usamos el SP con PDO
        $data['articulos'] = $this->articuloPDO->obtenerPorCategoria(strtolower($categoria));
        $data['categoria'] = ucfirst($categoria);

        echo view('layout/header');
        echo view('articulos/categoria', $data);
        echo view('layout/footer');
    }

    /**
     * Formulario para agregar noticia
     */
    public function crear()
    {
        echo view('layout/header');
        echo view('articulos/crear');
        echo view('layout/footer');
    }

    /**
     * Guardar noticia mediante procedimientos almacenados
     */
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

        // Subida de imagen
        $imagenNombre = null;
        $imagenFile = $this->request->getFile('imagen');
        if ($imagenFile && $imagenFile->isValid() && !$imagenFile->hasMoved()) {
            $imagenNombre = $imagenFile->getRandomName();
            $imagenFile->move(ROOTPATH . 'public/uploads', $imagenNombre);
        }

        // Inserción usando SP
        $resultado = $this->articuloPDO->insertarArticulo(
            $this->request->getPost('titulo'),
            $this->request->getPost('contenido'),
            strtolower($this->request->getPost('categoria')),
            $imagenNombre
        );

        if ($resultado) {
            return redirect()->to('/articulos')->with('mensaje', 'Artículo creado correctamente con PDO + SP');
        } else {
            return redirect()->back()->with('error', 'Error al guardar el artículo.');
        }
    }

    /**
     * Ver un artículo individual por su ID
     */
    public function ver($id = null)
    {
        if ($id === null) {
            return redirect()->to('/articulos')->with('error', 'Artículo no encontrado.');
        }

        // Usamos el método en el modelo PDO
        $articulo = $this->articuloPDO->obtenerPorId($id);

        if (!$articulo) {
            return redirect()->to('/articulos')->with('error', 'Artículo no encontrado.');
        }

        $data['articulo'] = $articulo;

        echo view('layout/header');
        echo view('articulos/ver', $data);
        echo view('layout/footer');
    }
}