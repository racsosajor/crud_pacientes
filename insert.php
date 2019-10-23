<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$cedula=$_POST['cedula'];
		$telefono=$_POST['telefono'];
	
		

		if(!empty($nombre) && !empty($apellidos) && !empty($cedula) && !empty($telefono)){
				$consulta_insert=$con->prepare('INSERT INTO pacientes(nombre,apellidos,cedula,telefono) VALUES (:nombre,:apellidos,:cedula,:telefono)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellidos' =>$apellidos,
					':cedula' =>$cedula,
					':telefono' =>$telefono,
					
				));
				header('Location: index.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Paciente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
	<div class="contenedor">
		<h2>CRUD PACIENTE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apellidos" placeholder="Apellidos" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="cedula" placeholder="Cedula" class="input__text">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text">
				
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
