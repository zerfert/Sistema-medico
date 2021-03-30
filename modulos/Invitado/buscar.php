<script type="text/javascript" language="javascript" src="./eli.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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

    $query = "SELECT paciente.id_p,paciente.nombre,medico.especialidad,paciente.tel,medico.nombreM,ingreso.fecha,ingreso.hora,ingreso.obser,ingreso.estado,ingreso.id_i FROM ingreso INNER JOIN paciente on paciente.nhistorial=ingreso.nhistorial INNER JOIN medico ON ingreso.id_m=medico.id_m";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT paciente.id_p,paciente.nombre,medico.especialidad,paciente.tel,medico.nombreM,ingreso.fecha,ingreso.id_i,ingreso.hora,ingreso.obser,ingreso.estado FROM ingreso INNER JOIN paciente on paciente.nhistorial=ingreso.nhistorial INNER JOIN medico ON ingreso.id_m=medico.id_m where paciente.id_p=$q";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	echo "<table border=1 class='tabla_datos'>
    			<thead>
                <th>Identificacion</th><th>Nombre</th><th>Medico</th><th>Especialidad</th><th>Fecha</th><th>Hora</th><th>Observaciones</th><th>Estado del la cita</th>

    			</thead>
    			

    	<tbody>";
    	while ($fila = $resultado->fetch_assoc()) {
    		echo "<tr>
    					<td>".$fila['id_p']."</td>
    					<td>".$fila['nombre']."</td>
    					<td>".$fila['nombreM']."</td>
    					<td>".$fila['especialidad']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['hora']."</td>
                        <td>".$fila['obser']."</td>
						<td>".$fila['estado']."</td>";

    	}
    	echo "</tbody></table>";
    }else{
    	echo "";
    }


    $conn->close();



?>