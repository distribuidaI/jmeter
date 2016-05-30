<?php

if (!isset($_GET['code'])) {
    http_response_code(400);
}

$airportCode = $_GET['code'];

?>

<html>
<head>
    <script src="jquery-2.2.4.min"></script>
    <title>Pruebas de JMeter</title>

    <script type="application/javascript">
        var airṕortCode = '<?php echo $airportCode; ?>'
        var url = "http://services.faa.gov/airport/status/" + airṕortCode + "?format=application/json";
        jQuery.get(url).done( function(data) {
            $("#code").html(data.IATA);
            $("#ciudad").html(data.city);
            $("#estado").html(data.state);
            $("#nombre").html(data.name);
            var retraso = "No tiene retraso";
            if (data.delay != "false") {
                retraso = "Se registran retrasos";
            }
            $("#status").html(retraso);
            console.log(data);
        });
    </script>
</head>
<body>
<h1 id="code"></h1>

<h2>Tiene retraso?</h2>
<span id="status"></span>

<h2>Datos</h2>
<table>
    <tr>
        <td>Nombre</td>
        <td id="nombre"></td>
    </tr>
    <tr>
        <td>Ciudad</td>
        <td id="ciudad"></td>
    </tr>
    <tr>
        <td>Estado</td>
        <td id="estado"></td>
    </tr>
</table>


</body>
</html>

