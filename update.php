<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM pacientes WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$cedula=$_POST['cedula'];
		$telefono=$_POST['telefono'];
		
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($apellidos) && !empty($cedula) && !empty($telefono)){
			
				$consulta_update=$con->prepare(' UPDATE pacientes SET  
					nombre=:nombre,
					apellidos=:apellidos,
					cedula=:cedula,
					telefono=:telefono
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellidos' =>$apellidos,
					':cedula' =>$cedula,
					':telefono' =>$telefono,
					':id' =>$id
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
	<title>Editar Paciente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD PACIENTE</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>" class="input__text">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
				
			</div>
		
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
