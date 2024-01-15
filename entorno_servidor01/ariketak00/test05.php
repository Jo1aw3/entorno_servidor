<?php

$n1 = 1;
$n2 = 2;
$n3 = 3;
$n4 = 4;

$c21 = pow($n1,2);
$c22 = pow($n2,2);
$c23 = pow($n3,2);
$c24 = pow($n4,2);

$c31 = pow($n1,3);
$c32 = pow($n2,3);
$c33 = pow($n3,3);
$c34 = pow($n4,3);

echo $c23;

?>

<html>
	<body>
		<table>
			<tr>
				<th>N</th>
				<th>Cuadrado</th>
				<th>Cubo</th>
			</tr>
			
			<?php
			
			$concatenar = '';
			foreach ($datos as $calculo) {
			    $concatenar .= '<tr>';
			    $concatenar .= '<td>' . $calculo
			}
			
			?>
			
		</table>
	</body>
</html>