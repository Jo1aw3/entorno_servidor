<?php

$agenda = array(
    'joshua' => '688 565 458',
    'chris' => '388 655 489',
    'luken' => '654 894 165'
);

$boton = filter_input(INPUT_POST, 'gorde');
$nombre = filter_input(INPUT_POST, 'izena');
$telefono = filter_input(INPUT_POST, 'tel');

if ($boton != null) {
    if ($nombre != null && $telefono != null) {
        if (!array_key_exists($nombre, $agenda)) {
            echo "contacto guardado";
            $agenda[$nombre] = $telefono;
        } else {
            echo "el numero se a actualizado";
            $agenda[$nombre] = $telefono;
        }
        
        foreach ($agenda as $izena => $telf) {
            echo "<table border='1'>
                        <tr>
                            <td>" . $izena . "</td>
                            <td>" . $telf . "</td>
                        </tr>
                    </table>";
        }
    } else if ($nombre != null && $telefono == null) {
        echo "no has metido el telefono ";
     
    } else {
        echo "no has metido el nombre";
    }
}

?>