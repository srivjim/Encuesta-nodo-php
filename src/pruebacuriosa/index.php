<?php
// Incluir el archivo de conexión a la base de datos
require_once 'db_connection.php';

// Comprobar si la conexión fue exitosa
if ($conn) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
}
?>
