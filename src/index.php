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

        .btn-container {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Encuesta Electoral</h1>

        <form action="submit_vote.php" method="POST">
            <p>¿Quién crees que ganará las próximas elecciones?</p>
            <input type="radio" name="opcion" value="Candidato A"> Candidato A<br>
            <input type="radio" name="opcion" value="Candidato B"> Candidato B<br>
            <input type="radio" name="opcion" value="Candidato C"> Candidato C<br>
            <input type="submit" value="Votar">
        </form>

        <div class="btn-container">
            <a class="btn" href="statistics.php">Ver Estadísticas</a>
        </div>
    </div>
</body>
</html>
