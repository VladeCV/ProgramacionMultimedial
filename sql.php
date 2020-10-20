
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
</head>
<body>
    <?php 
        $conn = mysqli_connect("localhost","root","");
        mysqli_select_db($conn, "examen");
        
        $sql = "select 
        SUM(case when notas.nota >= '51' AND idetificador.residencia ='01' then 1 ELSE 0 END) CH,
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '02' then 1 ELSE 0 END) LP, 
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '03' then 1 ELSE 0 END) CBBA,
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '04' then 1 ELSE 0 END) ORU, 
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '05' then 1 ELSE 0 END) PT, 
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '06' then 1 ELSE 0 END) TJ, 
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '07' then 1 ELSE 0 END) SCZ, 
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '08' then 1 ELSE 0 END) BEN, 
        SUM(case when notas.nota >= '51' AND idetificador.residencia = '09' then 1 ELSE 0 END) PN 
        from idetificador, notas WHERE idetificador.id=notas.id";
    
        $resultado = mysqli_query($conn, $sql);
    ?> 
    <h1>Resultado de la consulta</h1> 
    <br>  
    <table border="1px">
		<tr>
			<td>CH</td>
			<td>LP</td>
			<td>CBBA</td>
			<td>ORU</td>
			<td>PT</td>
            <td>TJ</td>
			<td>SCZ</td>
			<td>BEN</td>
			<td>PND.</td>
		</tr>
		<?php
			while ($fila = mysqli_fetch_row($resultado)){
				echo "<tr>";
				echo "<td>".$fila[0]."</td>";
				echo "<td>".$fila[1]."</td>";
				echo "<td>".$fila[2]."</td>";
				echo "<td>".$fila[3]."</td>";
                echo "<td>".$fila[4]."</td>";
                echo "<td>".$fila[5]."</td>";
				echo "<td>".$fila[6]."</td>";
				echo "<td>".$fila[7]."</td>";
                echo "<td>".$fila[8]."</td>";
                echo "<tr>";	
			}
		?>
	</table>
</body>
</html>