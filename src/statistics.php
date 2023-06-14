<?php
$servername = "192.168.58.151";
$username = "root";
$password = "bolson";
$dbname = "encuesta";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos de votos por opción
$sql = "SELECT opcion, COUNT(*) as total FROM encuesta GROUP BY opcion";
$result = $conn->query($sql);

$statistics = array();
while ($row = $result->fetch_assoc()) {
    $statistics[$row['opcion']] = $row['total'];
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estadísticas de la Encuesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .statistics {
            margin-top: 20px;
        }

        .option {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Estadísticas de la Encuesta</h1>

        <div class="statistics">
            <?php foreach ($statistics as $opcion => $total) : ?>
                <div class="option">
                    <strong><?php echo $opcion; ?></strong>: <?php echo $total; ?> votos
                </div>
            <?php endforeach; ?>
        </div>

        <div class="btn-container">
            <a class="btn" href="index.php">Volver a la Encuesta</a>
        </div>
    </div>
</body>
</html>


