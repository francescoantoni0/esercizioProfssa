<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Visualizza DB</title>
</head>
<body>
<h1 class="title">Visualizzazione DB</h1>
<br>
<label>Inizio:
    <input id="first_date" type="date">
</label>
<label id="second_date">
    Fine: <input type="date">
</label>
<button id="go_button">Vai!</button>
<?php
$connector = new mysqli("cangurivolanti.ddns.net", "datagrip-host",
    "cangurivolanti", "books");
$query = "SELECT * FROM libri WHERE Anno BETWEEN ? AND ?";

//$connector->query($query);
?>

</body>
</html>