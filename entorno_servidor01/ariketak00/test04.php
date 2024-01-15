<?php

$caracter = "!";

// is_numeric
// ctype_upper
// ctype_lower
// ctype_space
// preg_match
 
if (is_numeric($caracter)) {
    echo "el caracter '$caracter' es un numero";
}
elseif (ctype_upper($caracter)) {
    echo "el caracter '$caracter' es una mayuscula";
}
elseif (ctype_lower($caracter)) {
    echo "el caracter '$caracter' es una minuscula";
}
elseif (ctype_space($caracter)) {
    echo "el caracter '&caracter' es un espacio en blanco";
}
elseif (preg_match('/[[:punct:]]/', $caracter)) {
    echo "el caracter '$caracter' es un signo";
}
else {
    echo "el caracter '$caracter' es otro caracter";
}

?>