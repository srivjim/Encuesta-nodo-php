<!DOCTYPE html>
<html>
<head>
    <title>Encuesta Electoral</title>
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
        <h1>Encuesta Electoral</h1>

        <form action="submit_vote.php" method="POST" class="form-container">
            <div class="option">
                <input type="radio" name="opcion" value="Candidato A" id="opcion_a">
                <label for="opcion_a">Candidato A</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato B" id="opcion_b">
                <label for="opcion_b">Candidato B</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato C" id="opcion_c">
                <label for="opcion_c">Candidato C</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato D" id="opcion_d">
                <label for="opcion_d">Candidato D</label>
            </div>
            <div class="option">
                <input type="radio" name="opcion" value="Candidato E" id="opcion_e">
                <label for="opcion_e">Candidato E</label>
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

