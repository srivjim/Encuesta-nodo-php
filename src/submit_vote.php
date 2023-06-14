<?php
$servername = "192.168.58.151";
$username = "root";
$password = "bolson";
$dbname = "encuesta";

// Verificar si se recibieron datos de voto
if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];

    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Insertar el voto en la base de datos
    $sql = "INSERT INTO encuesta (opcion) VALUES ('$opcion')";
    if ($conn->query($sql) === TRUE) {
        $message = "Su voto ha sido enviado correctamente.";
    } else {
        $message = "Error al enviar el voto: " . $conn->error;
    }

    $conn->close();
} else {
    $message = "No se recibieron datos de voto.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado del Voto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2980b9, #2c3e50);
            color: #ffffff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #ffffff;
            font-size: 48px;
            margin-bottom: 30px;
        }

        .message {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 16px 32px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 0 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado del Voto</h1>

        <p class="message"><?php echo $message; ?></p>

        <div class="btn-container">
            <a class="btn" href="statistics.php">Ver Estadísticas</a>
            <a class="btn" href="index.php">Atrás</a>
        </div>
    </div>
</body>
</html>
