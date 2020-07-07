<?php
	include $_SERVER['DOCUMENT_ROOT']."/medMaskCore/php/config.php";
	include $_SERVER['DOCUMENT_ROOT']."/medMaskCore/php/connector.php";
	if (isset($_GET['localidad']))
    {
		$dbConn =  connect($db);
		$sql = $dbConn->prepare("SELECT id,nombre,apellido,pais,provincia,localidad,email,institucion FROM solicitante where localidad=:localidad");
		$sql->bindValue(':localidad', $_GET['localidad']);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 OK");
		header('Content-type:application/json');
		echo json_encode($sql->fetchAll());
		exit();
    }
?>
