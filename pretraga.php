<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultati pretrage</title>
    <style>
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 3px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img{
            width: 600px;
            height: 400px;
        }

        .back-button {
            background-color: #4CAF50; 
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: block; 
            margin: 10px auto;
            cursor: pointer;
            border-radius: 5px;
            transition-duration: 0.4s;
}
    
    </style>
</head>
<body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $marka = ($_POST['marka']);
        $xmlFile = 'motori.xml';

        $xml = simplexml_load_file($xmlFile);

        echo "<h1>Rezultati pretrage za marku: $marka</h1>";
        echo "<table>";
        $found = false;
        foreach ($xml->motor as $motor) {
            if ($motor->marka == $marka) {
                echo "<tr><td>" . $motor->model . "</td><td><img src='" . $motor->slika . "' alt=''></td></tr>";
                $found = true;
            }
        }
        if (!$found) {
            echo "<tr><td colspan='2'>Nema rezultata za traženu marku.</td></tr>";
        }
        echo "</table>";

        
    }
?>
<button class="back-button" onclick="window.location.href='index.html'">Nazad</button>
</body>
</html>
