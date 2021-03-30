
<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "clinica";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM paciente";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM paciente where id_p=$q";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	echo "<table border=1 class='tabla_datos'>
    			<thead>
                <th>N Historial Medico</th><th>Identificacion</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th>Editar</th><th>Descargar Historial</th>

    			</thead>
    			

    	<tbody>";
    	while ($fila = $resultado->fetch_assoc()) {
    		echo "<tr>
                        <td>".$fila['nhistorial']."</td>
                        <td>".$fila['id_p']."</td>
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['direccion']."</td>
                        <td>".$fila['tel']."</td>";
						?>
						<td><a href="javascript:void(0);" onclick="window.location='editarp.php?i=<?php echo $fila['id_p']?>'" title="Descargar"><img src="../../img/edit.png" width="25" height="25"></a>
						</td>
						<td><a href="javascript:void(0);" onclick="window.location='generarPDF.php?i=<?php echo $fila['id_p']?>'" title="Descargar"><img src="../../img/pdf.png" width="40" height="40"></a>
						</td>
						</tr>
						<?php 

    	}
    	echo "</tbody></table>";
    }else{
    	echo "";
    }


    $conn->close();



?>