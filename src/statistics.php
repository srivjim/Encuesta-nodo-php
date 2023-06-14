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
            background: linear-gradient(to right, #f9a825, #e53935);
            color: #ffffff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #ffffff;
            font-size: 48px;
            margin-bottom: 30px;
        }

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 40px;
        }

        .chart-title {
            color: #ffffff;
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
            flex: 0 0 200px;
            text-align: right;
            padding-right: 10px;
            color: #ffffff;
        }

        .chart-bar-value {
            flex: 1;
            color: #ffffff;
            height: 30px;
            line-height: 30px;
            border-radius: 5px;
        }

        .chart-bar-color {
            width: 20px;
            height: 20px;
            border-radius: 5px;
            margin-left: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 16px 32px;
            background-color: #e53935;
            color: #ffffff;
            text-decoration: none;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 0 10px;
        }

        .btn:hover {
            background-color: #c62828;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Estadísticas de la Encuesta</h1>

        <div class="chart-container">
            <p class="chart-title">Opciones de Voto</p>
            <div class="chart-bar">
                <div class="chart-bar-label">Unidas Podemos</div>
                <div class="chart-bar-value"><?php echo $statistics['Unidas Podemos'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #3498db;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">Sumar</div>
                <div class="chart-bar-value"><?php echo $statistics['Sumar'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #e74c3c;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">Avanzar</div>
                <div class="chart-bar-value"><?php echo $statistics['Avanzar'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #f39c12;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">PSOE</div>
                <div class="chart-bar-value"><?php echo $statistics['PSOE'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #9c27b0;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">PP</div>
                <div class="chart-bar-value"><?php echo $statistics['PP'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #3f51b5;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">VOX</div>
                <div class="chart-bar-value"><?php echo $statistics['VOX'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #2196f3;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">Otros/No sabe</div>
                <div class="chart-bar-value"><?php echo $statistics['Otros/No sabe'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #607d8b;"></div>
            </div>
        </div>

        <canvas id="chart"></canvas>

        <div class="btn-container">
            <a class="btn" href="index.php">Volver a la Encuesta</a>
        </div>
    </div>

    <script>
        // Obtener los datos de PHP
        var statistics = <?php echo json_encode($statistics); ?>;

        // Convertir los datos a formato adecuado para Chart.js
        var labels = Object.keys(statistics);
        var values = Object.values(statistics);

        // Definir los colores para cada opción
        var colors = ['#3498db', '#e74c3c', '#f39c12', '#9c27b0', '#3f51b5', '#2196f3', '#607d8b'];

        // Configuración de la gráfica
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Votos',
                    data: values,
                    backgroundColor: colors
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
</body>
</html>
