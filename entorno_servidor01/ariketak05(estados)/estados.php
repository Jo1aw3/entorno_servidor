<?php
$paises = array(
    'Francia' => 67000000,
    'Mali' => 250000,
    'Brasil' => 300000000,
    'Pakistan' => 350000000,
    'Islas Marshall' => 55000
);

$poblaciones = array(
    '0-100000-Deshabitado',
    '100001-1000000-Poco Poblado',
    '1000001-100000000-Poblado',
    '100000001-1000000000-Muy Poblado'
);


$continentes = array(
    'Europa' => 'Francia, Portugal, Italia',
    'Asia' => 'China, Turquia, Pakistan',
    'Africa' => 'Nigeria, Marruecos, Mali',
    'America' => 'EEUU, Brasil, Argentina',
    'Oceania' => 'Australia, Polinesia, Islas Marshall'
);

foreach ($paises as $pais => $poblacion) {
    $descripcion_poblacion = ""; 
    foreach ($poblaciones as $poblacion_desc) {
        $tiorico = explode('-', $poblacion_desc);
        if ($poblacion >= $tiorico[0] && $poblacion <= $tiorico[1]) {
            $descripcion_poblacion = $tiorico[2];
            break;
        }
    }
    
    $continente = "";
    foreach ($continentes as $nombre_continente => $paises_continente) {
        if (str_contains($paises_continente, $pais)) {
            $continente = $nombre_continente;
            break;
        }
    }
    echo $pais . " es un pais " . $descripcion_poblacion . " de " . $continente . "<br>";
}
?>