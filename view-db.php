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
<?php

if (!isset($_GET['go_button'])) {

} else {
    $connector = new mysqli("localhost", "datagrip-host",
        "cangurivolanti", "books");
    $query = 'SELECT * FROM libri, editori, autori WHERE libri.Id_Editore = editori.Id_Editore AND autori.Id_Autore = libri.Id_Autore AND Anno BETWEEN ? AND ?';
    $beg_date = $_GET['first_date'];
    $end_date = $_GET['second_date'];
    $statement = $connector->prepare($query);
    $statement->bind_param("ss", $beg_date, $end_date);
    $statement->execute();
    $result = $statement->get_result();
    echo '<br>';
    echo '<table>';
    echo "<tr>";
    echo "<th>ISBN</th>";
    echo "<th>Titolo</th>";
    echo '<th>Editore</th>';
    echo '<th>Autore</th>';
    echo '<th>Anno</th>';
    echo "</tr>";

    foreach ($result as $row){
        echo "<tr>";
        echo "<td>$row[ISBN]</td>";
        echo "<td>$row[Titolo]</td>";
        echo "<td>$row[Ragione_Sociale]</td>";
        echo "<td>$row[Cognome]</td>";
        echo "<td>$row[Anno]</td>";
        echo "</tr>";
    }
}
?>

<form action="view-db.php" method="get">
    <label>Inizio:
        <input name="first_date" type="number">
    </label>
    <label>
        Fine: <input name="second_date" type="number">
    </label>
    <input id="go" type="submit" name="go_button" value="Go!">
</form>
</body>
</html>
