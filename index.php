<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new PDO('mysql:host=localhost;dbname=airports', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


$stmt = $db->prepare("SELECT * FROM airport");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_NUM);

?>


<html>
<head>
    <title>Pruebas de JMeter</title>
</head>
<body>
<h1>Lista de Aeropuertos de Estados Unidos</h1>
<ul>
    <?php foreach ($rows as $row) { ?>
    <li><a href="details.php?code=<?php echo $row[2] ?>"><?php echo $row[0] ?> - <?php echo $row[1] ?></a></li>
    <?php } ?>
</ul>
</body>
</html>
