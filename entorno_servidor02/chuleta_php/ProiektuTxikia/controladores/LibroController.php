<?php
require_once 'modelos/LibroModelo.php';

class LibroController {
    public function mostrarHome() {
        require 'vistas/home.php';
    }

    public function listarLibros() {
        $libroModelo = new LibroModelo();
        $libros = $libroModelo->obtenerLibros();
        require 'vistas/libros/lista-libros.php';
    }
}
