<?php
session_start();
?>
<?php
try {

	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "207460988";
	$db_name = "HorariosBus";

	$mysqli = new mysqli("$host_db", "$user_db", "$pass_db", "$db_name");
	if (mysqli_connect_errno()) {
		echo "Este sitio esta presentando problemas";
	}
	$mysqli->set_charset("utf8");
} catch (mysqli_sql_exception $e) {
	throw $e;
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}
mysqli_close($conexion);
?>