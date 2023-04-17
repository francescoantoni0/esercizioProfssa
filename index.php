<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Libri</title>
</head>

<body>

<h1 class="title">Gestione Libri</h1>
<ul>
    <li><button><a href="view-db.php">Visualizza database</a></button></li>
</ul>
<form action="index.php">
    <label>
        Elimina libro: <input type="text" name="deleter" placeholder="978-88-88-88-8">
    </label>
    <input type="submit" name="go_deleter" value="Elimina!">
</form>
<?php
if (!isset($_GET['deleter'])) {

} else {
    $connector = new mysqli("localhost", "datagrip-host",
        "cangurivolanti", "books");
    $query = "DELETE FROM libri WHERE ISBN = ?";
    $statement = $connector->prepare($query);
    $statement->bind_param("s", $_GET['deleter']);
    $statement->execute();
}
?>
</body>
</html>

