<?php

if (!isset($_GET['code'])) {
    http_response_code(400);
}

$airportCode = $_GET['code'];

$processed = FALSE;
$ERROR_MESSAGE = '';

// ************* Call API:
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://services.faa.gov/airport/status/$airportCode?format=application/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close ($ch);

$response = json_decode($json);
?>

<html>
<body>
<h1><?php echo $response->IATA; ?></h1>

<h2>Status</h2>
<?php echo $response->status->reason ?>

<h2>Datos</h2>
<table>
    <tr>
        <td>Nombre</td>
        <td><?php echo $response->name ?></td>
    </tr>
    <tr>
        <td>Ciudad</td>
        <td><?php echo $response->city ?></td>
    </tr>
    <tr>
        <td>Estado</td>
        <td><?php echo $response->state ?></td>
    </tr>
</table>


</body>
</html>

