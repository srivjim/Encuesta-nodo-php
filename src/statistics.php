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
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333333;
            font-size: 32px;
            margin-bottom: 30px;
        }

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .chart-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .chart-bar {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .chart-bar-label {
            flex: 0 0 120px;
            text-align: right;
            padding-right: 10px;
        }

        .chart-bar-value {
            flex: 1;
            background-color: #4CAF50;
            color: #ffffff;
            height: 30px;
            line-height: 30px;
            border-radius: 5px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Estadísticas de la Encuesta</h1>

        <div class="chart-container">
            <canvas id="chart"></canvas>
        </div>

        <script>
            // Obtener los datos de PHP
            var statistics = <?php echo json_encode($statistics); ?>;

            // Convertir los datos a formato adecuado para Chart.js
            var labels = Object.keys(statistics);
            var values = Object.values(statistics);

            // Configuración de la gráfica
            var ctx = document.getElementById('chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Votos',
                        data: values,
                        backgroundColor: '#4CAF50'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>

        <div class="btn-container">
            <a class="btn" href="index.php">Volver a la Encuesta</a>
        </div>
    </div>
</body>
</html>


