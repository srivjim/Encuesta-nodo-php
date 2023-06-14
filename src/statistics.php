<body>
    <div class="container">
        <h1>Estadísticas de la Encuesta</h1>

        <div class="chart-container">
            <p class="chart-title">Opciones de Voto</p>
            <div class="chart-bar">
                <div class="chart-bar-label">Unidas Podemos</div>
                <div class="chart-bar-value"><?php echo $statistics['Unidas Podemos'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #8e44ad;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">Sumar</div>
                <div class="chart-bar-value"><?php echo $statistics['Sumar'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #e91e63;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">PSOE</div>
                <div class="chart-bar-value"><?php echo $statistics['PSOE'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #ff0000;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">PP</div>
                <div class="chart-bar-value"><?php echo $statistics['PP'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #3f51b5;"></div>
            </div>
            <div class="chart-bar">
                <div class="chart-bar-label">VOX</div>
                <div class="chart-bar-value"><?php echo $statistics['VOX'] ?? 0; ?></div>
                <div class="chart-bar-color" style="background-color: #4caf50;"></div>
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
        var colors = {
            'Unidas Podemos': '#8e44ad',
            'Sumar': '#e91e63',
            'PSOE': '#ff0000',
            'PP': '#3f51b5',
            'VOX': '#4caf50',
            'Otros/No sabe': '#607d8b'
        };

        // Obtener los colores en el mismo orden que las etiquetas
        var barColors = labels.map(function(label) {
            return colors[label];
        });

        // Configuración de la gráfica
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Votos',
                    data: values,
                    backgroundColor: barColors
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
