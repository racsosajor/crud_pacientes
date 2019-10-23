<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT * FROM pacientes ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<script type="text/javascript">
	function confirmarDelete(){
		var respuesta= confirm("Esta seguro de eliminar registro de paciente?");
		if (respuesta==true)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
</script>
<body>
	<div class="contenedor">
		<h2>CRUD PACIENTE</h2>
		
			<form action="" class="formulario" method="post">
				<a href="insert.php" class="btn btn__nuevo">Nuevo Paciente</a>
			</form>
		
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Apellidos</td>
				<td>Cedula</td>
				<td>Teléfono</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellidos']; ?></td>
					<td><?php echo $fila['cedula']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
				
				
					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete" onclick="return confirmarDelete()">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>