<!DOCTYPE html>
<html>
<head>
    <title>Elecciones Generales 2023</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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

        h2 {
            color: #666666;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .option {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .option input[type="radio"] {
            margin-right: 10px;
        }

        .option label {
            font-size: 18px;
            color: #333333;
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
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Elecciones Generales 2023</h1>
        <h2>¿Quién crees que va a ganar?</h2>

        <form action="submit_vote.php" method="POST" class="form-container">
            <div class="option">
                <input type="radio" name="opcion" value="Candidato A" id="opcion_a">
                <label for="opcion_a" style="color: #3498db;">PP</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato B" id="opcion_b">
                <label for="opcion_b" style="color: #e74c3c;">PSOE</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato C" id="opcion_c">
                <label for="opcion_c" style="color: #9b59b6;">Unidas Podemos</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato D" id="opcion_d">
                <label for="opcion_d" style="color: #f06292;">Sumar</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato E" id="opcion_e">
                <label for="opcion_e">VOX</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato F" id="opcion_f">
                <label for="opcion_f">Otros/No sabe</label>
            </div>
            <div class="btn-container">
                <input type="submit" value="Votar" class="btn">
            </div>
        </form>

        <div class="btn-container">
            <a class="btn" href="statistics.php">Ver Estadísticas</a>
        </div>
    </div>
</body>
</html>
