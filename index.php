<?php
$url = 'https://api.covidtracking.com/v1/us/current.json';
$response = file_get_contents($url);

if ($response === false) {
    echo "Error en la solicitud a la API de Covid Tracking.";
} else {
    $data = json_decode($response, true);
    $currentData = $data[0];

    $positiveCases = $currentData['positive'];
    $deathCases = $currentData['death'];
    $recoveredCases = $currentData['recovered'];
    $hospitalizedCases = $currentData['hospitalizedCurrently'];
    $date = $currentData['date'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Información en EE. UU.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            background-color: #2c3e50;
            color: white;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Información de COVID-19 en EE. UU.</h1>
    </header>

    <div class="content">
        <h2>Datos COVID-19</h2>
        <p><strong>Fecha de actualización:</strong> <?php echo date('d-m-Y', strtotime((string) $date)); ?></p>
        <p><strong>Casos Confirmados:</strong> <?php echo number_format($positiveCases); ?></p>
        <p><strong>Muertes:</strong> <?php echo number_format($deathCases); ?></p>
        <p><strong>Recuperados:</strong> <?php echo number_format($recoveredCases); ?></p>
        <p><strong>Hospitalizados actualmente:</strong> <?php echo number_format($hospitalizedCases); ?></p>
        <img src="covid.gif" alt="Gif del covid">
    </div>

    <footer>
        <p>© 2025 Carlos Javier Gutiérrez Gutiérrez</p>
    </footer>
</body>

</html>
