<?php
class FiguraGeometrica {
    
    // declaración de las propiedades/atributos de la clase
    public $nombre;
    public $color;
    
    // constructor de las propiedades de la clase sin ningun valor
    public function __construct($nombre, $color) {
        $this->nombre=$nombre;
        $this->color=$color;
    }
    
    // Metodos get and set
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    
    public function escribir() {
        echo $this->nombre=$nombre;
        echo $color;
    }
    
}
?>