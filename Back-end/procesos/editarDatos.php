<?php

	require_once "../php/connect.php";
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$email=$_POST['email'];
	$clave1=$_POST['clave1'];
	$clave2=$_POST['clave2'];
	$clave3=$_POST['clave3'];
	if($clave1!="" && $clave2!="" && $clave3!=""){
		$cons="SELECT * FROM usuario WHERE id='$id'";
		$consulta1=$mysqli->query($cons);
		$fila=$consulta1->fetch_array(MYSQLI_ASSOC);
		$claveOriginal=md5($clave1);
		if($claveOriginal==$fila['Clave']){
			if($clave2==$clave3){
				$clave=md5($clave2);
				$campos="Nombre='$nombre',Apellido='$apellido',Email='$email',Clave='$clave'";
			}else{
				echo "Las claves no coinciden";
				exit();
			}
		}else{
			echo "La clave es incorrecta";
			exit();
		}
		
	}else{
		$campos="Nombre='$nombre',Apellido='$apellido',Email='$email'";
	}
	$query="UPDATE usuario SET $campos WHERE id='$id'";
	if($mysqli->query($query)){
		echo "Datos actualizados";
	}else{
		echo "Error no se pudo actualizar los datos";
	}